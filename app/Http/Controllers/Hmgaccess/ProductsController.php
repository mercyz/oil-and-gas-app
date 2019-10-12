<?php

namespace App\Http\Controllers\Hmgaccess;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\ProductImage;
use Image;

class ProductsController extends Controller
{
    public function __construct(){
    	$this->middleware('auth:admin')->except('logout');
    }
    public function index(){
    	$products = DB::table('products')->paginate(15);
    	return view('pages.admin.products.index', compact('products'));
    }
    public function createProduct(){
    	return view('pages.admin.products.createproductform');
    }
    public function storeProduct(Product $product){

        $add = request()->validate($this->productFields());
        $product = Product::create($add);
        if(!empty(request('productimage'))){
            $files = request()->file('productimage');
            foreach($files as $file){
                $fileNameWithExt = $file->getClientOriginalExtension();
                $fileUploadPath = 'uploads/products/';
                $fileNameToStore = uniqid().uniqid().".".$fileNameWithExt;
                $formatedImageFile = str_replace("", "-", $fileNameToStore);

                $fullImage = Image::make($file->getRealPath());
                $fullImage->resize(774, 330);
                $fullImage->save($fileUploadPath.$formatedImageFile);
                
                $productImage = new ProductImage();
               $productImage->product_id = $product->id;
               $productImage->name = \str_slug($product->name, '-').uniqid();
               $productImage->uploadPath = $fileUploadPath.$formatedImageFile;
               $productImage->save();
            }
        }
        return redirect('/hmgaccess/products')->with('message', 'Product Uploaded Successful');

    }
    public function productFields(){
        return [
            'name' => 'required',
            'description' => 'required',
        ];
    }
    public function editProduct($product){
        $product = Product::find($product);
        return view('pages.admin.products.editproduct', compact('product'));
    }
    public function updateProduct(Product $product){
        $updateRule = request()->validate([
            'name' => 'required|string',
            'description' => 'required|string',
        ]);
        if(request()->hasFile('productimage')){
            array_merge($updateRule, ['productimage'=>'image|mimes:jpg,jpeg,png,svg,gif']);
            if(!empty(request('productimage'))){
                $files = request()->file('productimage');
                foreach($files as $file){
                    $fileNameWithExt = $file->getClientOriginalExtension();
                    $fileUploadPath = 'uploads/products/';
                    $fileNameToStore = uniqid().uniqid().".".$fileNameWithExt;
                    $formatedImageFile = str_replace("", "-", $fileNameToStore);

                    $fullImage = Image::make($file->getRealPath());
                    $fullImage->resize(774, 330);
                    $fullImage->save($fileUploadPath.$formatedImageFile);
                    
                    $productImage = new ProductImage();
                   $productImage->product_id = $product->id;
                   $productImage->name = \str_slug($product->name, '-').uniqid();
                   $productImage->uploadpath = $fileUploadPath.$formatedImageFile;
                   $productImage->save();
                }
            }
        }
        $getProductId = Product::find($product);
        $product->update($updateRule);
        return redirect('/hmgaccess/products')->with('message', 'Product Updated Successfully');
    }
    public function deleteProduct($product){
        $product = Product::find($product);
        $product->delete();
        return back()->with('massage', 'Product Deleted Successful');
    }
    public function deleteImage($product_id){
        $delImage = ProductImage::find(request()->id);
        $delImage->delete();
        return response()->json(['message' => 'Image Deleted']);
    }
}
