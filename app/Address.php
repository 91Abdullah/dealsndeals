<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = ['address', 'city', 'country', 'alias', 'identification', 'customer_id'];

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }
}
