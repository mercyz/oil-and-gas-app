<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Staff extends Authenticatable
{
    use Notifiable;

    protected $guard = 'staff';
    protected $guarded = [];

   	protected $hidden = ['password', 'remember_token'];

   	protected $casts = ['email_verified_at' => 'datetime'];
   	public static function createStaff($staff){
   		$staff = Staff::create($staff);
   		return $staff;
   	}
    public function getStaffProfile(){
      return $this->hasOne('App\Models\StaffProfile');
    }
}