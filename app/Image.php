<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    //
    protected $fillable = ['name', 'is_cover'];

    public function product()
    {
        $this->belongsTo('App\Product');
    }
}
