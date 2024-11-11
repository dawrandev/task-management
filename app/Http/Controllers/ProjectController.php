<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Faker\Provider\Lorem;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function projects(){
        $projects = Project::all();
        return view('admin.projects', compact('projects'));
    }
    public function create_project_page(){
        return view('admin.create_project');
    }
    public function create_project(Request $request){
        $validate = $request->validate([
            'name'=>'required|unique:projects',
            'description'=>'required',
            'status'=>'required',
            'datetime'=>'required'
        ]);
        
        $project = Project::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'status'=>$request->status,
            'due_date'=>$request->datetime
        ]);
        return $this->projects();
    }
}


