<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    //
    public function cart()
    {
        return $this->belongsTo('App\Cart');
    }

    public function products()
    {
        return $this->belongsToMany('App\Product');
    }
}
