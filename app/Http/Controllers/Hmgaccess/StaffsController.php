<?php

namespace App\Http\Controllers\Hmgaccess;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Notifications\NewStaffAdded;
use App\Models\Staff;
use App\Models\StaffProfile;

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
}
