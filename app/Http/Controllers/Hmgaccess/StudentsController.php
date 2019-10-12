<?php

namespace App\Http\Controllers\Hmgaccess;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Notifications\VerifyEmail;
use App\Models\SelectedCourse;
use App\Models\Course;
use App\User;
use Image;

class StudentsController extends Controller
{
	public function __construct(){
		$this->middleware('auth:admin');
	}
    public function index(){
    	$students = DB::table('users')->paginate(1);
        $dd = Carbon::now();
    	return view('pages.admin.students.index', compact('students', 'dd'));
    }

    public function createStudent(){
        return view('pages.admin.students.addstudent');
    }

    public function studentFields()
    {
    	return [
    		'firstname' => 'required',
    		'lastname' => 'required',
    		'gender' => 'required',
    		'email' => 'required',
    		'password' => 'required',
    		'phone' => 'required',
    		'nationality' => 'required',
    		'residential_address' => 'required',
    		'state' => 'required',
    		'lga' => 'required',
    		'country_of_residence'=> 'required',
    		'academic_qualification' => 'required',
    		'next_of_kin_name' => 'required',
    		'next_of_kin_phone' => 'required',
    		'occupation' => 'required',
    		'job_role' => 'required',
    		'address' => 'required',
    		'profileimage' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:1999',
    	];
    }

    public function addStudent(User $user)
    {
    	//image Handler
    	if(!empty(request('profileimage'))){
    		$fileNameWithExt = request()->file('profileimage')->getClientOriginalExtension();
    		$filePath = 'uploads/students/';
    		$fileNameToStore = uniqid().uniqid().".".$fileNameWithExt;
    		$formatedImageFile = str_replace("", "-", $fileNameToStore);
    		//full image
    		$fullImage = Image::make(request('profileimage')->getRealPath());
    		$fullImage->resize(300, 300);
    		$fullImage->save($filePath.$formatedImageFile);

    	}
    	$add = request()->validate($this->studentFields());	
    	$profileImage = array_merge($add, ['password'=>bcrypt('password'), 'token'=>str_random(25),'profileimage'=>$fileNameToStore]);
        $student = User::create($profileImage);
        $student->sendVerificationEmail();;
        return redirect('/hmgaccess/students')->with('message', 'Student Added Successfully waiting for activation token');
    }

    public function studentDetail($user)
    {
        $student = User::find($user);
        $courses = Course::orderBy('title', 'ASC')->get();
        return view('pages.admin.students.studentdetail', compact('student', 'courses'));
    }

    public function editStudent($user){
        $student = User::find($user);
        return view('pages.admin.students.editStudent', compact('student'));
    }
    public function updateStudent(User $user){
       $updateRule = request()->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'gender' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'nationality' => 'required',
            'residential_address' => 'required',
            'state' => 'required',
            'lga' => 'required',
            'country_of_residence'=> 'required',
            'academic_qualification' => 'required',
            'next_of_kin_name' => 'required',
            'next_of_kin_phone' => 'required',
            'occupation' => 'required',
            'job_role' => 'required',
            'address' => 'required',
        ]);
          
        if(request()->has('password')){
            $user->password = bcrypt(request()->password);
            $user->save();
        }

        if(request()->hasFile('profileimage')){
           array_merge($updateRule,['profileimage'=>'profileimage|mimes:jpg,jpeg,png,svg,gif']); 
            //image Handler
            if(!empty(request('profileimage'))){
                $fileNameWithExt = request()->file('profileimage')->getClientOriginalExtension();
                $filePath = 'uploads/students/';
                $fileNameToStore = uniqid().uniqid().".".$fileNameWithExt;
                $formatedImageFile = str_replace("", "-", $fileNameToStore);
                //full image
                $fullImage = Image::make(request('profileimage')->getRealPath());
                $fullImage->resize(300, 300);
                $fullImage->save($filePath.$formatedImageFile);

            }
            $user->profileImage = $fileNameToStore;
            $user->save();
        }
        $user->update($updateRule);
        return redirect()->route('students');
    }
    public function deleteStudent($user){
        $student = User::find($user);
        $student->delete();
        return redirect()->route('students')->with('message', 'Student Record Deleted Successfully');
    }

}
