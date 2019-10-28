<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Course;

class CoursesController extends Controller
{
    public function index(){
    	$courses = Course::orderBy('title', 'ASC')->get();
    	return view('pages.front.course.index', compact('courses'));
    }
    public function singleCourse($course){
    	$course = Course::find($course);
    	return view('pages.front.course.showCourse', compact('course'));
    }
}
