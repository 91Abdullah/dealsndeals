<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    //
    public function order_detail()
    {
        return $this->hasOne('App\OrderDetail');
    }
}
