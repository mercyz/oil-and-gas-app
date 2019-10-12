<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Notifications\VerifyEmail;
use App\Models\Course;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname', 'gender', 'email', 'password',
        'phone', 'nationality', 'residential_address', 'state', 'lga',
        'country_of_residence', 'academic_qualification', 'next_of_kin_name',
        'next_of_kin_phone', 'occupation', 'job_role', 'profileimage', 'address','token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function verified(){
        return $this->active === 1;
    }

     public function sendVerificationEmail(){

        return $this->notify(new VerifyEmail($this));
    }
    public function saveStudent($user){
        $user = User::create($user);
        return $user;
    }
    public function selectedCourses(){
        return $this->hasMany('App\Models\SelectedCourse');
    }
    public function hasSelectedCourse(Course $course){
        return $this->selectedCourses()->where('course_id', $course->id)->count() > 0;
    }
    
    public function hasCourses() {
        return $this->selectedCourses()->count() > 0;
    }
}
