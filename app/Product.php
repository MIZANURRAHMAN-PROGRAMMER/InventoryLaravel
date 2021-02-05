<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'product_name', 'cat_id', 'product_details','product_code','product_image',
    ];
}
