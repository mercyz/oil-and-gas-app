<?php

namespace App\Http\Controllers\StudentPortal;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Notifications\AccountActiveSuccess;
use App\Notifications\VerifyEmail;
use App\Notifications\UserLoginNotify;
use App\User;

class DashboardController extends Controller
{

	public function __construct(){
		$this->middleware(['auth']);
	}

    public function index(){
    	return view('pages/students/index');
    }

    public function profileForm(){
    	$user = Auth::user();
    	return view('pages.students.updateprofile', compact('user'));;
    }

   public function UpdateProfile(User $user){
   		$user = Auth::user();
        //image handler
        request()->validate($this->profileRules());
  		$user->update(request()->all());
        return redirect('/student/dashboard')->with('message', 'profile Updated Succesfully');
    }

    public function profileRules(){
    	return[
    		'gender' => 'required',
    		'phone' => 'required',
    		'nationality' => 'required',
    		'residential_address' => 'required',
    		'state' => 'required',
    		'lga' => 'required',
    		'country_of_residence' => 'required',
    		'academic_qualification' => 'required',
    		'next_of_kin_name' => 'required',
    		'next_of_kin_phone' => 'required',
    		'occupation' => 'required',
    		'job_role' => 'required',
    		'address' => 'required',
    		'profileimage' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:1999',
     	];
    }
}
