<?php

namespace App\Imports;

use ImportHelper;
use App\Item;
use App\Order;

use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;

use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeImport;

class ItemsImport implements ToModel, WithCustomCsvSettings, WithValidation, WithBatchInserts, WithEvents
{

    use Importable;

    protected $order;
    protected $customer;

    public function __construct(Object $order, Object $customer)
    {
        $this->order = $order;
        $this->customer = $customer;
    }

    public function registerEvents(): array
    {
        return [
            // Handle by a closure.
            BeforeImport::class => function(BeforeImport $event) {
                $rowCount = $event->reader->getActiveSheet()->getHighestRow() - 1; // Minus the header line
                $order = Order::find($this->order->id);
                $order->rows = $rowCount;
                $order->save();
            }
			        
        ];
    }


    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
       
        // Check if code exist in product table
        if ($productDetails = ImportHelper::getProduct($row[1])){
           
            return new Item([
                'product_id'       => $productDetails->id,
                'order_id'         => $this->order->id,
                'replace_product'  => $productDetails->remplacement_product,
                'quantity'         => $row[0],
                'sell_price'       => ImportHelper::cleanNumber($row[6]),
                'buy_price'        => ImportHelper::cleanNumber($row[6]) - ( ImportHelper::cleanNumber($row[6]) * $this->customer->tarif->coef ),
                'pcb'              => $productDetails->pcb,
                'uv'               => $row[5],
                'poids'            => ImportHelper::cleanNumber($row[8]),
                'volume'           => ImportHelper::cleanNumber($row[10]),
                'created_at'       => $this->order->created_at,
                'updated_at'       => $this->order->updated_at
            ]);

        }

    }

    public function rules(): array
    {
        return [
             
             /* Can also use callback validation rules
             '0' => function($attribute, $value, $onFailure) {
                  if ($value !== 'Patrick Brouwers') {
                       $onFailure('Name is not Patrick Brouwers');
                  }
              }*/
        ];
    }

    public function getCsvSettings(): array
    {
        return [
            'delimiter' => '|'
        ];
    }

    public function batchSize(): int
    {
        return 5000;
    }
}
