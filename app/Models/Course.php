<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    
	protected $guarded = [];

	public function selectedCourses(){
		return $this->hasMany('App\Models\SelectedCourse');
	}
    public function addCourse($course){
    	$course = Course::create($course);
    	return $course;
    }
    public function users(){
    	return $this->belongsTo('App\User');
    }

    
}
