<?php

namespace App\Http\Controllers;

use App\Product;
use App\Order;
use App\Customer;
use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Imports\ItemsImport;

use Maatwebsite\Excel\Facades\Excel;

class OrderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }


    public function index()
    {
        $orders = Order::with(['customer'])->orderBy('id', 'DESC')->withCount('items')->get();
        return view('orders.index')->with(['orders'=> $orders]);
    }

    public function importExportView()
    {
       $customers = Customer::orderBy('name', 'ASC')->get();
       return view('import')->with(['customers'=> $customers]);

    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function import(Request $request) 
    {
      
        if(!$request->date){
            $createdAt = Carbon::now();
        } else {
            $createdAt = Carbon::parse($request->date);
        }

        //Create new order
        $order = new Order;

        $order->order_number = $request->orderNumber;
        $order->invoice_number = $request->invoiceNumber;
        $order->vessel = $request->vessel;
        $order->container = $request->container;
        $order->plomb = $request->plomb;
        $order->etd = Carbon::parse($request->eta);
        $order->eta = Carbon::parse($request->etd);
        $order->rows = $request->customer;
        $order->customer_id = $request->customer;
        $order->created_at = $createdAt;
        $order->updated_at = $createdAt;
        $order->save();

        $customer = Customer::with('tarif')->find($order->customer_id);
    
        try {
            $import = Excel::import(new ItemsImport($order, $customer), request()->file('file'));

        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            dd($e->failures());
            return 'error';
            $failures = $e->failures();
        } 

        return redirect()->action('OrderController@index');

    }

}
