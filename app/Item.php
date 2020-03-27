<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{

    protected $fillable = ['product_id' , 
                           'order_id', 
                           'replace_product', 
                           'quantity',
                           'sell_price', 
                           'buy_price', 
                           'pcb', 
                           'uv', 
                           'poids', 
                           'volume',
                           'created_at',
                           'updated_at']; 

    public function order()
    {
        return $this->belongsTo('App\Order');
    }

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
