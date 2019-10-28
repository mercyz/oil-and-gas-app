<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductsController extends Controller
{
     public function index(){
    	$products = Product::orderBy('name', 'ASC')->get();
    	return view('pages.front.product.index', compact('products'));
    }
    public function singleService($product){
    	$product = Product::find($product);
    	return view('pages.front.product.showProduct', compact('product'));
    }
}
