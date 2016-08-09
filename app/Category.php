<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Cviebrock\EloquentSluggable\Sluggable;

use Baum;

class Category extends Baum\Node
{
    //
    use Sluggable;

    protected $fillable = ['description', 'meta_title', 'meta_description', 'name', 'active'];
    protected $casts = ['active' => 'boolean'];

    public function products()
    {
        return $this->belongsToMany('App\Product');
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
