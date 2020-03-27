<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    public function top()
    {
       
        //$items = Item::select('product_id', DB::raw('count(*) count'))->with('product')->orderBy('count','desc')->groupBy('product_id')->take(50)->get();
        $items = Item::select( DB::raw('product_id, sum(quantity) as sum'))->with(['product', 'product.category', 'order'])
        /*->whereHas('order', function ($query) {
            $query->where('customer_id', 19);
        })*/
        
        ->orderBy('sum','desc')->groupBy('product_id')->get();
        

        return view('items.top')->with(['items'=> $items->toArray()]);
    }
}
