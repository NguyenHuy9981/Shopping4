<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'price',
        'feature_image',
        'feature_image_name',
        'content',
        'user_id',
        'category_id',
    ];

    public function images()
    {
        return $this->hasMany('App\ProductImage');
    }

    public function categories()
    {
        return $this->belongsTo('App\Category', 'category_id');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag', 'product_tags', 'product_id', 'tag_id')
                    ->withTimestamps();
    }
}
