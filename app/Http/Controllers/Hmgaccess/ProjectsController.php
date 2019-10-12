<?php

namespace App\Http\Controllers\Hmgaccess;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Project;
use App\Models\ProjectImage;
use Image;

class ProjectsController extends Controller
{
   	public function __construct(){
   		$this->middleware('auth:admin')->except('logout');
   	}
   	public function index(){
   		$projects = DB::table('projects')->paginate(15);
   		return view('pages.admin.projects.index', compact('projects'));
   	}
   	public function createProject(){
   		return view('pages.admin.projects.createproject');
   	}
   	public function storeProject(Project $project){
			$add = request()->validate($this->projectFields());
			$project = Project::create($add);

   		if(!empty(request('projectimages'))){
   			$files = request()->file('projectimages');
   			foreach($files as $file){
   				$fileNameWithExt = $file->getClientOriginalExtension();
   				$fileUploadPath = 'uploads/projects/';
   				$fileNameToStore = uniqid().uniqid().".".$fileNameWithExt;
   				$formatedImageFile = str_replace("", "-", $fileNameToStore);

   				$fullImage = Image::make($file->getRealPath());
   				$fullImage->resize(778, 330);
   				$fullImage->save($fileUploadPath.$formatedImageFile);

   				//Store in the Project Image Table...
   				$projectImage = new ProjectImage();
   				$projectImage->project_id = $project->id;
   				$projectImage->name = str_slug($project->name, "-").uniqid();
               $projectImage->uploadpath = $fileUploadPath.$formatedImageFile;
   				$projectImage->save();
   			}
   		}
   		return redirect('/hmgaccess/projects/')->with('message', 'Project Uploaded Successfully');
   	}

   	public function projectFields(){
   		return[
   			'name' => 'required|string',
   			'description' => 'required|string',
   			'service' => 'string',
   			'location' => 'string',
   			'duration' => 'string',
   			'client' => 'string',
   		];
   	}

   	public function editProject($project){
   		$project =  Project::find($project);
   		return view('pages.admin.projects.editproject', compact('project'));
   	}
      public function updateProject(Project $project){
         $updateRule = request()->validate([
               'name' => 'required|string',
               'description' => 'required|string',
               'service' => 'string',
               'location' => 'string',
               'duration' => 'string',
               'client' => 'string',
         ]);
         if(request()->hasFile('projectimages')){
            array_merge($updateRule,['projectimages'=> 'image|mimes:jpg,jpeg,png,svg,gif']);
            if(!empty(request('projectimages'))){
            $files = request()->file('projectimages');
            foreach($files as $file){
               $fileNameWithExt = $file->getClientOriginalExtension();
               $fileUploadPath = 'uploads/projects/';
               $fileNameToStore = uniqid().uniqid().".".$fileNameWithExt;
               $formatedImageFile = str_replace("", "-", $fileNameToStore);

               $fullImage = Image::make($file->getRealPath());
               $fullImage->resize(778, 330);
               $fullImage->save($fileUploadPath.$formatedImageFile);

               //Store in the Project Image Table...
               $projectImage = new ProjectImage();
               $projectImage->project_id = $project->id;
               $projectImage->name = str_slug($project->name, "-").uniqid();
               $projectImage->uploadpath = $fileUploadPath.$formatedImageFile;
               $projectImage->save();
            }
         }
      }
         $getProjectId = Project::find($project);
         $project->update($updateRule);
         return redirect('/hmgaccess/projects')->with('message', 'Project Updated Successfully');
      }

      public function deleteProject($project){
         $project = Project::find($project);
         $project->delete();
         return back()->with('message', 'Project Deleted');
      }
      public function deleteImage($project_id){
         $delImage = ProjectImage::find(request()->id);
         $delImage->delete();
         return response()->json(['message' => 'Image Deleted']);
      }

}
