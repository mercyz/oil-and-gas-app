<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SelectedCourse extends Model
{
    protected $guarded = [];

    public function users(){
    	return $this->belongsTo('App\User', 'user_id');
    }
    public function courses(){
    	return $this->belongsTo('App\Models\Course', 'course_id');
    }
}
