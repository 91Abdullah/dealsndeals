<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable = ['customer_id', 'cart_id', 'voucher_id', 'reference'];

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

    public function cart()
    {
        return $this->belongsTo('App\Cart');
    }

    public function voucher()
    {
        return $this->belongsTo('App\Voucher');
    }
}
