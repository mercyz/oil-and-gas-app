<?php

namespace App\Http\Controllers\Hmgaccess;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Notifications\NewStaffAdded;
use App\Models\Staff;
use App\Models\StaffProfile;
use Image;

class StaffsController extends Controller
{
    public function __construct(){
    	$this->middleware('auth:admin')->except('logout');
    }
    public function index(){
    	$staffs = Staff::orderBy('firstname', 'ASC')->paginate(15);
    	return view('pages.admin.staffs.index', compact('staffs'));
    }
    public function createStaffForm(){
    	return view('pages.admin.staffs.addStaff');
    }
    public function addStaff(){
    	$staffData = request()->validate($this->staffFormField());
    	$store = Staff::createStaff(array_merge($staffData,
    		['password' => bcrypt(request()->password), 'token' => str_random(20)]));

    	$data = (object) array(
    		'email' => request()->email,
    		'phone' => request()->phone,
    		'firstname' => request()->firstname,
    		'lastname' =>  request()->lastname,
    		'password' => request()->password,
    		'token' => $store->token,
    	);
            (new StaffProfile)->forceCreate(['staff_id' => $store->id]);
    		$store->notify(new NewStaffAdded($data));
    		return redirect()->route('staffs')->with('message', 'New Staff Added Successfully');
    }
    public function staffFormField(){
    	return [
    		'firstname' => 'required|string',
    		'lastname' => 'required|string',
    		'email' => 'required|string',
    		'phone' => 'required|string',
    		'password' => 'required|string',
    	];
    }

    public function StaffDetails($staff){
        $staffData = Staff::with('getStaffProfile')->findOrFail($staff);
        return view('pages.admin.staffs.staffDetails', compact('staffData'));
    }
    public function editStaff($staff){
        $staff =  Staff::find($staff);
        return view('pages.admin.staffs.editStaff', compact('staff'));
    }
    public function updateStaff(Staff $staff){
        $staffData = request()->validate($this->staffUpdateFields());
        if(request()->has('password')){
            $staff->password = bcrypt(request()->password);
            $staff->save();
        }
        if(request()->hasFile('profileimage')){
            array_merge($staffData, ['profileimage' => 'profileimage|mimes:jpg,jpeg,png,gif,svg']);
            if(!empty(request('profileimage'))){
                $fileNameWithExt = request()->file('image')->getClientOriginalExtension();
                $uploadPath = 'uploads/staffs/profile/';
                $fileNameToStore = uniqid().uniqid().".".$fileNameWithExt;
                $formattedImageFile = str_replace("", "-", $fileNameToStore);

                $profilePic = Image::make(request('profileimage')->getRealPath());
                $profilePic->resize(300,300);
                $profilePic->save($formattedImageFile.$fileNameToStore);
            }
        }

        $staff->update($staffData);
        session()->flash('message', 'Staff Details Updated Successfully');
        Session::flash('type', 'success');
        Session::flash('title', 'Staff Updated');
        return redirect()->route('staffs');
    }
    public function staffUpdateFields(){
        return [
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'email' => 'required|string',
            'phone' => 'required|string',
            'country' => 'string',
            'state' => 'string',
            'city' => 'string',
            'address' => 'string',
        ];
    }
    public function deleteStaff($staff){
        $staff = Staff::find($staff);
        $staff->delete();   

        session()->flash('message', 'Staff Record Has been deleted Successfully');
        Session::flash('type', 'success');
        Session::flash('title', 'Staff Deleted');

        return redirect()->route('staffs');
    }
}
