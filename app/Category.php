<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Cviebrock\EloquentSluggable\Sluggable;

use Kalnoy\Nestedset\NodeTrait;

class Category extends Model
{
    //
    use NodeTrait;
    use Sluggable;

    protected $fillable = ['description', 'meta_title', 'meta_description', 'name', 'active'];
    protected $casts = ['active' => 'boolean'];

    public function products()
    {
        $this->belongsToMany('App\Product');
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
