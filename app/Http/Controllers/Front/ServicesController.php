<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Service;

class ServicesController extends Controller
{
    public function index(){
    	$services = Service::orderBy('name', 'ASC')->get();
    	return view('pages.front.service.index', compact('services'));
    }
    public function singleService($service){
    	$service = Service::find($service);
    	return view('pages.front.service.showService', compact('service'));
    }
}
