<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Project;

class ProjectsController extends Controller
{
    public function index(){
    	$project = Project::orderBy('name', 'ASC')->get();
    	return view('pages.front.project.index', compact('projects'));
    }
    public function showProject($project){
    	$project = Project::find($project);
    	return view('pages.front.project.singleProject', compact('project'));
    }
}
