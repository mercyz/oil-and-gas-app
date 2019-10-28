<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(){

    	return view('pages.front.home');
    }
    public function about(){
    	return view('pages.front.about');
    }
}
