<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
	protected $guarded = [];
    public function addCareer($career){
    	$career = Career::create($career);
    	return $career;
    }
}
