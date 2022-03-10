<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $fillable = [
        'image_path',
        'image_path_name',
        'product_id',
    ];
}
