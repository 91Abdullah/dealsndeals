<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Cviebrock\EloquentSluggable\Sluggable;

class Product extends Model
{
    use Sluggable;
    //
    protected $fillable = ['name', 'sku', 'meta_title', 'meta_description', 'slug',
        'wholesale_price', 'price', 'description', 'category_id', 'long_description'];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function images()
    {
        $this->hasMany('App\Image');
    }

    public function default_category()
    {
        $this->hasOne('App\Category');
    }

    public function categories()
    {
        $this->belongsToMany('App\Category');
    }
}
