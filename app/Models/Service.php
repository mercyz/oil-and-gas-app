<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $guarded = [];
    public function addService($service){
    	$service = Service::create($service);
    	return $service;
    }
}
