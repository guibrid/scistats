<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function items()
    {
        return $this->belongsToMany('App\Item');
    }

    public function brand()
    {
        return $this->belongsTo('App\Brand');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function sub_category()
    {
        return $this->belongsTo('App\Sub_category');
    }

}
