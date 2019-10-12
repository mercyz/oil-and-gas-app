<?php

namespace App\Http\Controllers\Hmgaccess;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Staff;

class StaffsControlller extends Controller
{
    public function __construct(){
    	$this->middleware('auth:admin')->except('logout');
    }
    public function index(){
    	$staffs = Staffs::all()->paginate(15);
    	return view('', compact('staffs'));
    }
}
