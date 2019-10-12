<?php

namespace App\Http\Controllers\StudentPortal;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client; 
use Auth;
use App\User;
use App\Models\Course;
use App\Models\SelectedCourse;


class CoursesController extends Controller
{
    public function __construct(){
    	$this->middleware(['auth']);
    }
    public function course(){
    	$courses = Course::all()->take(15);
    	return view('pages.students.course.index', compact('courses'));
    }
    public function courseDetail($course){
    	$course = Course::find($course);
    	return view('pages.students.course.coursedetail', compact('course'));
    }
    public function myCourses(){
    	$user = \Auth::User();
    	$courses = Course::orderBy('title', 'ASC')->get();
    	return view('pages.students.course.mycourses', compact('user', 'courses'));
    }
    public function makePayments(Request $request, Course $course){
    	// dd('am here');
    	$this->validate($request, ['reference' => 'required|string']);
    	$url = "https://api.paystack.co/transaction/verify/{$request->reference}";
    	try{
    		$response = (new client)->get($url, [
    			"headers" => [
    				"Authorization" => "Bearer " . config('paystack.secretKey')
    			]
    		]);
    		$data = json_decode($response->getBody()->getContents(), true);
    		if($data['status'] && $data['data']['status'] === 'success'){
    			auth()->user()->selectedCourses()->create(['course_id'=> $course->id]);
    			return response()->json(['message'=>'Success'], 200);
    		}
    		throw new \Exception("Payment not verified");
    	}catch(Exception $e){
    		return response()->json(['message' => $e->getMessage()], 500);
    	}
    }

}
