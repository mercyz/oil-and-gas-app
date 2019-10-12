<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin;
use Auth;

class AdminsController extends Controller
{
   
	protected $redirectTo = '/hmgaccess/dashboard';

    public function __construct(){

    	$this->middleware('guest:admin')->except('logout');
    }

    public function showLoginForm()
    {
    	return view('pages.admin.adminLogin');
    }


    public function doLoginAdmin(Request $request)
    {
    	$this->validate($request, [
    		'username' => 'required|string|max:255',
    		'password' => 'required|string|max:8',
    	]);
        
    	if(Auth::guard('admin')->attempt(['username' => $request->username, 'password' => $request->password], $request->remember)){

    		return redirect('/hmgaccess/dashboard');
    	}
    	return back()->withInput($request->only('username', 'remember'));
    }

    public function doLogout(Request $request)
    {
        Auth::logout();
        return redirect('/hmgaccess/login');
    }

}
