<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    public function productImage(){
        return $this->hasMany('App\Models\ProductImage');
    }
    public function addProduct($product){
            $product = Product::create($product);
            return $product;
    }
}
