<?php

namespace App\Http\Controllers\Staffs;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\StaffProfile;
use App\Models\Staff;
use Auth;
use Image;

class StaffsController extends Controller
{

    public function __construct(){
    	$this->middleware('auth:staff');
    }
    public function index(){
    	return view('pages.staffs.index');
    }
    public function viewProfile($staff){
    	$authUser = Auth::user()->id;
    	$staff = Staff::with('getStaffProfile')->findOrFail($authUser);
    	return view('pages.staffs.staffprofile', compact('staff'));
    }

    public function updateForm($staff){
    	$authUser =  Auth::user()->id;
    	$staff = Staff::with('getStaffProfile')->findOrFail($authUser);

    	return view('pages.staffs.editProfile', compact('staff'));
    }
    public function updateStaffRecord(Staff $staff,Request $request){
    	$authUser =  Auth::user()->id;
    	$up = Staff::where('id', $authUser)->first();
	    $updateRule = request()->validate($this->updateFields());
	    if(request()->has('password')){
	    	$staff->password = bcrypt(request()->password);
	    	$staff->save();
	    }
	    //profileimage
	    if(request()->hasFile('profileimage')){
	    	array_merge($updateRule, ['profileimage' => 'profileimage|mimes:jpg,jpeg,png,pdf']);
	    	if(!empty(request('profileimage'))){
	    		$fileNameWithExt = request()->file('profileimage')->getClientOriginalExtension();
	    		$uploadPath = 'uploads/staffs/profile/';
	    		$fileNameToStore = uniqid().uniqid().".".$fileNameWithExt;
	    		$formattedImageFile = str_replace("", "-", $fileNameToStore);

	    		$doc = Image::make(request('profileimage')->getRealPath());
	    		$doc->resize(128,128);
	    		$doc->save($uploadPath.$fileNameToStore);
	    	}
	    	$staff->profileimage = $fileNameToStore;
	    	$staff->save();
	    }


	    // $staffprofile = new StaffProfile();
	    $staffprofile = StaffProfile::where('staff_id', $authUser)->first();
	    $staffprofile->academic_qualification = $request->academic_qualification;
	    $staffprofile->work_experience = $request->work_experience;
	    $staffprofile->brief_description = $request->brief_description;
	    $staffprofile->next_of_kin_name = $request->next_of_kin_name;
	    $staffprofile->next_of_kin_email = $request->next_of_kin_email;
	    $staffprofile->next_of_kin_phone = $request->next_of_kin_phone;
 	    // dd($staffprofile);
	    $staffprofile->save();

	    //offshore Permit
	    if(request()->hasFile('offshore_permit')){
	    	// array_merge($updateRule, ['offshore_permit' => 'offshore_permit|mimes:jpg,jpeg,png,pdf']);
	    	if(!empty(request('offshore_permit'))){
	    		$fileNameWithExt = request()->file('offshore_permit')->getClientOriginalExtension();
	    		$uploadPath = 'uploads/staffs/files/';
	    		$fileNameToStore = uniqid().uniqid().".".$fileNameWithExt;
	    		$formattedImageFile = str_replace("", "-", $fileNameToStore);

	    		$doc = Image::make(request('offshore_permit')->getRealPath());
	    		$doc->resize(500,768);
	    		$doc->save($uploadPath.$fileNameToStore);
	    	}
	    	$staffprofile->offshore_permit = $fileNameToStore;
	    	$staffprofile->save();
	    }

	    //medicals
	    if(request()->hasFile('medicals')){
	    	// array_merge($updateRule, ['medicals' => 'medicals|mimes:jpg,jpeg,png,pdf']);
	    	if(!empty(request('medicals'))){
	    		$fileNameWithExt = request()->file('medicals')->getClientOriginalExtension();
	    		$uploadPath = 'uploads/staffs/files/';
	    		$fileNameToStore = uniqid().uniqid().".".$fileNameWithExt;
	    		$formattedImageFile = str_replace("", "-", $fileNameToStore);

	    		$doc = Image::make(request('medicals')->getRealPath());
	    		$doc->resize(500,768);
	    		$doc->save($uploadPath.$fileNameToStore);
	    	}
	    	$staffprofile->medicals = $fileNameToStore;
	    	$staffprofile->save();
	    }
	    //Bioset
	    if(request()->hasFile('boiset')){
	    	// array_merge($updateRule, ['bioset' => 'bioset|mimes:jpg,jpeg,png,pdf']);
	    	if(!empty(request('boiset'))){
	    		$fileNameWithExt = request()->file('boiset')->getClientOriginalExtension();
	    		$uploadPath = 'uploads/staffs/files/';
	    		$fileNameToStore = uniqid().uniqid().".".$fileNameWithExt;
	    		$formattedImageFile = str_replace("", "-", $fileNameToStore);

	    		$doc = Image::make(request('boiset')->getRealPath());
	    		$doc->resize(500,768);
	    		$doc->save($uploadPath.$fileNameToStore);
	    	}
	    	$staffprofile->boiset = $fileNameToStore;
	    	$staffprofile->save();
	    }

	    $getStaffRecord = Staff::find($authUser);
	    $staff->update($updateRule);
	    return redirect()->route('viewprofile', $staff->id);
    }
    public function updateFields(){
    	return [
    		'firstname' => 'required|string',
    		'lastname' => 'required|string',
    		'email' => 'required|string',
    		'phone' => 'required|string',
    		'address' => 'required|string',
    		'city' => 'required|string',
    		'state' => 'required|string',
    		'country' => 'required|string',
    		'gender' => 'required|string',
    	];
    }
}
