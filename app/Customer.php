<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    protected $fillable = ['name', 'email', 'phone', 'password', 'active', 'newsletter'];

    public function address()
    {
        return $this->hasOne('App\Address');
    }
}
