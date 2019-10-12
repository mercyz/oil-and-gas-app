<?php

namespace App\Http\Controllers\Hmgaccess;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\Service;
use Image;

class ServicesController extends Controller
{
    public function __construct(){
    	$this->middleware('auth:admin');
    }
    public function index(){
    	$services =  DB::table('services')->paginate(10);
    	return view('pages.admin.services.index', compact('services'));
    }
    public function createService(){
    	return view('pages.admin.services.addservice');
    }
    public function addService(Service $service){
        if(!empty(request('featuredImage'))){
            $fileNameWithExt = request()->file('featuredImage')->getClientOriginalExtension();
            $fileUploadPath = 'uploads/services/';
            $thumbNailUploadPath = 'uploads/services/thumbnail/';
            $fileNameToStore = uniqid().uniqid().".".$fileNameWithExt;
            $formatedImageFile = str_replace("", "-", $fileNameToStore);

            //full Image
            $fullImage = Image::make(request('featuredImage')->getRealPath());
            $fullImage->resize(770, 330);
            $fullImage->save($fileUploadPath.$formatedImageFile);

            //Thumbnail
            $thumbNameImage = Image::make(request('featuredImage')->getRealPath());
            $thumbNameImage->resize(330, 155);
            $thumbNameImage->save($thumbNailUploadPath.$formatedImageFile);

        }

        $add = request()->validate($this->serviceRule());
        $service->addService(array_merge($add, ['featuredImage' => $fileNameToStore]));
        return redirect('hmgaccess/services')->with('message', 'Service uploaded Successfully');
    }
    public function serviceRule(){
        return [
            'name' => 'required|string',
            'description' => 'required',
            'featuredImage' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:1999',
        ];
    }
    public function editService($service){
        $service = Service::find($service);
        return view('pages.admin.services.editservice', compact('service'));
    }
    public function updateService(Service $service){
        $updateRule = request()->validate([
            'name' => 'required|string',
            'description' => 'required',
        ]);
        if(request()->hasFile('featuredImage')){
            array_merge($updateRule,['featuredImage'=>'image|mimes:jpg,jpeg,png,svg,gif']);
            if(!empty(request('featuredImage'))){
            $fileNameWithExt = request()->file('featuredImage')->getClientOriginalExtension();
            $fileUploadPath = 'uploads/services/';
            $thumbNailUploadPath = 'uploads/services/thumbnail/';
            $fileNameToStore = uniqid().uniqid().".".$fileNameWithExt;
            $formatedImageFile = str_replace("", "-", $fileNameToStore);

            //full Image
            $fullImage = Image::make(request('featuredImage')->getRealPath());
            $fullImage->resize(770, 330);
            $fullImage->save($fileUploadPath.$formatedImageFile);

            //Thumbnail
            $thumbNameImage = Image::make(request('featuredImage')->getRealPath());
            $thumbNameImage->resize(330, 155);
            $thumbNameImage->save($thumbNailUploadPath.$formatedImageFile);

            }
            $service->featuredImage = $fileNameToStore;
            $service->save();
        }

        $getServiceId = Service::find($service);
        $service->update($updateRule);
        return redirect('/hmgaccess/services')->with('success', 'Services Updated Successfully');

    }
    public function deleteService($service){
        $service = Service::find($service);
        $service->delete();
        return redirect('/hmgaccess/services')->with('success', 'Service Deleted Successfully');
    }
}
