<?php

namespace App\Http\Controllers\Hmgaccess;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Career;
use Image;

class CareersController extends Controller
{
    public function __construct(){
    	$this->middleware('auth:admin')->except('logout');
    }
    public function index(){
    	$careers = Career::orderBy('title', 'ASC')->paginate(15);
    	return view('pages.admin.careers.index', compact('careers'));
    }
    public function careerCreate(){
    	return view('pages.admin.careers.addcareer');
    }
    public function storeCareer(Career $career){
    	if(!empty(request('featuredimage'))){
    		$fileNameWithExt = request()->file('featuredimage')->getClientOriginalExtension();
  			$fileUploadPath = 'uploads/careers/';
  			$fileNameToStore = uniqid().uniqid().".".$fileNameWithExt;
  			$formatedImageFile = str_replace(" ", "-", $fileNameToStore);

  			//full image
  			$fullImage = Image::make(request('featuredimage')->getRealPath());
  			$fullImage->resize(770, 390);
  			$fullImage->save($fileUploadPath.$formatedImageFile);
    	}
    	$add = request()->validate($this->careerFields());
    	$slug = str_slug(request()->title).uniqid().uniqid();
    	$career->addCareer(array_merge($add, ['featuredimage'=>$fileNameToStore, 'slug'=>$slug]));
    	return redirect()->route('careers')->with('message', 'Career uploaded Successfully');
    }
    public function careerFields(){
    	return [
    		'title' => 'required|string',
    		'description' => 'required|string',
    		'qualification'=> 'required|string',
    		'employment_type' => 'required|string',
    		'experience' => 'string',
    		'offer_id' => 'required|string',
    		'affiliate' => 'string',
    		'expires' => 'string',
    		'featuredimage' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:1999'
    	];
    }
    public function editCareer($career){
    	$career = Career::find($career);
    	return view('pages.admin.careers.editCareer', compact('career'));
    }
    public function updateCareer(Career $career){

    }
    public function deleteCareer($career){
    	$career = Career::find($career);
    	$career->delete();
    	return redirect()->route('careers')->with('message', 'Career was Successfully Deleted');
    }
}
