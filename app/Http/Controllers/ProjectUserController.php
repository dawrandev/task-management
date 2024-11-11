<?php

namespace App\Http\Controllers;

use App\Models\Project_user;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectUserController extends Controller
{
    public function assign_project_users_page($project_id){
        $project_user = Project_user::where('project_id', $project_id)
        ->first();
        if($project_user == null){
        $users = User::all();
        return view('admin.assign_project_users', compact('users', 'project_id'));
        }
        return redirect()->route('tasks_page', ['project_id'=>$project_id]);
    }
    public function assign_project_users(Request $request){
        foreach($request->user_id as $val){
            $project_users = Project_user::create([
                'project_id'=>$request->project_id,
                'user_id'=>$val
            ]);
        }
        return redirect()->route('tasks_page', ['project_id'=>$request->project_id]);
    }
}
