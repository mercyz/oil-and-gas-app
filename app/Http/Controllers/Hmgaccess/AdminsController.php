<?php

namespace App\Http\Controllers\Hmgaccess;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Admin;
use App\Models\Course;
use App\Models\Project;
use App\Models\SelectedCourse;
use App\User;
use Auth;



class AdminsController extends Controller
{

	public function __construct(){
		$this->middleware('auth:admin');
	}

	public function index()
	{
		$students = User::orderBy('firstname', 'DESC')->paginate(7);
		$courses = Course::orderBy('title', 'ASC')->get();
		$projects = Project::orderBy('name', 'ASC')->get();
		return view('pages.admin.dashboard', compact('students', 'courses', 'projects'));	
	}
	public function profile(){
		$admin = auth()->user();
		return view('pages.admin.profile', compact('admin'));
	}

}
