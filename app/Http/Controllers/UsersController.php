<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Notifications\UserLoginNotify;
use App\Notifications\AccountActiveSuccess;
use App\User;

class UsersController extends Controller
{
    

    public function verify($token){

    	$user = User::where('token', $token)->firstOrFail();
    	$user->token = null;
    	$user->active = 1;
    	$user->save();


    	$user->notify(new AccountActiveSuccess($user));
    	session()->flash('message', 'Your Email Address Has Been Successfully Verified');
    	Session::flash('type', 'success');
    	Session::flash('title', 'Verified Successful');

    	return redirect()->route('studentdashboard');
    }

    public function verifyLogout(){

    	session()->flash('message', 'Please check your email for verification code.');
    	session()->flash('type', 'danger');
    	Auth::logout();
    	return redirect()->route('login');
    }


}
