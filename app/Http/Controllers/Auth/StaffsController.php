<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Auth;
use App\Models\Staff;

class StaffsController extends Controller
{
	protected $redirectTo = '/staffroom/dashboard';

	public function __construct(){
		$this->middleware('guest:staff')->except('logout');
	}
	public function staffLoginForm(){return view('pages.staffs.login');}
	public function doStaffLogin(Request $request){
		$this->validate($request, [
			'email' => 'required|string|max:191',
			'password' => 'required|string|max:8',
		]);
		if(Auth::guard('staff')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)){
			return redirect('/staffroom/dashboard');
		}
		return back()->withInput($request->only('email', 'remember'));
	}
	public function doStaffLogout(Request $request){
		Auth::logout();
		return redirect('/hmgaccess/login');
	}
}