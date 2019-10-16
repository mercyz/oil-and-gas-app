<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StaffProfile extends Model
{
    public function getStaff(){
    	return $this->belongsTo('App\Models\Staff');
    }
}
