<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Cviebrock\EloquentSluggable\Sluggable;

class Product extends Model
{
    use Sluggable;
    //
    protected $fillable = ['name', 'sku', 'meta_title', 'meta_description',
        'wholesale_price', 'price', 'description', 'category_id', 'long_description', 'active', 'quantity'];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function order_detail()
    {
        return $this->belongsToMany('App\OrderDetail');
    }

    public function images()
    {
        return $this->hasMany('App\Image');
    }

    public function default_category()
    {
        return $this->belongsTo('App\Category', 'category_id');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }
}
