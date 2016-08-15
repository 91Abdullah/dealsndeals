<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use SahusoftCom\EloquentImageMutator\EloquentImageMutatorTrait;

class Image extends Model
{
    use EloquentImageMutatorTrait;
    protected $image_fields = ['product_image'];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
