<?php

namespace App\Http\Controllers\Staffs;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Staff;

class StaffsController extends Controller
{
    public function __construct(){
    	$this->middleware('auth:staff');
    }
    public function index(){
    	return view('pages.staffs.index');
    }
}
