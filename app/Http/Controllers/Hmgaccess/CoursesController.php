<?php

namespace App\Http\Controllers\Hmgaccess;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Notifications\NewCourseUpdate;
use App\Models\Course;
use Carbon\Carbon;
use App\User;
use Image;


class CoursesController extends Controller
{
	public function __construct(){
		$this->middleware('auth:admin');
	}

   public function index()
   {
   		$courses = DB::table('courses')->orderBy('created_at', 'desc')->paginate(10);
   		return view('pages.admin.course.index', compact('courses'));
 	}

   public function create(){return view('pages.admin.course.addcourse');}

   public function store(Course $course)
   {
      $users = User::orderBy('email', 'ASC')->get();
      $when = Carbon::now()->addSecond(10);
   		//image Handler
  		if(!empty(request('featuredimage'))){
  			$fileNameWithExt = request()->file('featuredimage')->getClientOriginalExtension();
  			$fileUploadPath = 'uploads/courses/';
  			$thumbNailPath =  'uploads/courses/thumbnails/';
  			$fileNameToStore = uniqid().uniqid().".".$fileNameWithExt;
  			$formatedImageFile = str_replace(" ", "-", $fileNameToStore);

  			//full image
  			$fullImage = Image::make(request('featuredimage')->getRealPath());
  			$fullImage->resize(770, 390);
  			$fullImage->save($fileUploadPath.$formatedImageFile);

  			$thumbNailSize = Image::make(request('featuredimage')->getRealPath());
  			$thumbNailSize->resize(150, 150);
  			$thumbNailSize->save($fileUploadPath.$formatedImageFile);
  		}

   		$add = request()->validate($this->courseFields());
   		$course->addCourse(array_merge($add, ['featuredimage'=>$fileNameToStore]));
      foreach($users as $user){
			$user->notify((new NewCourseUpdate($course))->delay($when));
      }
		return redirect('hmgaccess/course')->with('success', 'Course Uploaded Successful');   		

   }

   public function courseFields(){
   		return [
   			'title' => 'required',
   			'outline' => 'required',
   			'duration' => 'required',
   			'description' => 'required',
   			'requirements' => 'required',
   			'amount' => 'required',
   			'featuredimage' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:1999',];
   		}

       public function editCourse($course){
            $course = Course::find($course);
            return view('pages.admin.course.editcourse', compact('course'));
      }

      public function updateCourse(Course $course){
          $updateRules = request()->validate([
              'title' => 'required',
              'outline' => 'required',
              'duration' => 'required',
              'description' => 'required',
              'requirements' => 'required',
              'amount' => 'required',
          ]);
          //image Handler
          if(request()->hasFile('featuredimage')){
            array_merge($updateRules,['featuredimage'=>'image|mimes:jpg,jpeg,png,svg,gif']);
                if(!empty(request('featuredimage'))){
                  $fileNameWithExt = request()->file('featuredimage')->getClientOriginalExtension();
                  $fileUploadPath = 'uploads/courses/';
                  $thumbNailPath =  'uploads/courses/thumbnails/';
                  $fileNameToStore = uniqid().uniqid().".".$fileNameWithExt;
                  $formatedImageFile = str_replace(" ", "-", $fileNameToStore);

                  //full image
                  $fullImage = Image::make(request('featuredimage')->getRealPath());
                  $fullImage->resize(770, 390);
                  $fullImage->save($fileUploadPath.$formatedImageFile);

                  $thumbNailSize = Image::make(request('featuredimage')->getRealPath());
                  $thumbNailSize->resize(150, 150);
                  $thumbNailSize->save($fileUploadPath.$formatedImageFile);
                }
                $course->featuredimage = $fileNameToStore;
                $course->save();
          }
          $getCourseId = Course::find($course);
          $course->update($updateRules);
          return redirect('hmgaccess/course')->with('success', 'Course Updated Successfully');
      }
   	public function deleteCourse($course){
      $course = Course::find($course);
      $course->delete();
      return redirect('hmgaccess/course')->with('message', 'Courses Deleted Successfully');
    }

}
