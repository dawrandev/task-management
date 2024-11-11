<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Project_user;
use App\Models\Task;
use App\Models\Task_user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class TaskUserController extends Controller
{
    public function assign_task_users_page($project_id){
        $project_users = DB::table('project_users')
        ->join('users', 'project_users.user_id', '=', 'users.id')
        ->join('projects', 'project_users.project_id', '=', 'projects.id')
        ->where('project_id', $project_id)
        ->select('users.id as user_id', 'users.name as username', 'projects.name as projectname', 'users.role')
        ->get(); 
        $tasks = Task::where('project_id', $project_id)
        ->get();;
        return view('admin.assign_task_users', compact('project_users', 'tasks', 'project_id'));
    }
    public function assign_task_users(Request $request){
        $validate = $request->validate([
            'user_id'=>'required|min:1'
        ]);
        foreach($request->user_id as $val){
        $assign_task_users = Task_user::create([
            'project_id'=>$request->project_id,
            'task_id'=>$request->task_id,
            'user_id'=>$val
        ]);
        return redirect()->route('tasks_page', ['project_id'=>$request->project_id]);
    }
}
        public function project_users_page($project_id){
            $i = 1;
            $project_users = DB::table('users')
            ->join('project_users', 'users.id', '=', 'project_users.user_id')
            ->where('project_users.project_id', $project_id)
            ->select('users.name', 'users.role')
            ->get();
            $tasks = Task::where('project_id', $project_id)
            ->get();
            $task_users = DB::table('users')
            ->join('task_users', 'users.id', '=', 'task_users.user_id')
            ->where('task_id', 1)
            ->select('users.name', 'users.role')
            ->get();
            return view('admin.project_users', compact('project_id', 'project_users', 'i', 'tasks', 'task_users'));
        }
        public function search_task_users(Request $request){
            $task_users = DB::table('users')
            ->join('task_users', 'users.id', '=', 'task_users.user_id')
            ->where('task_id', $request->task_id)
            ->select('users.name', 'users.role')
            ->get();
            $project_users = DB::table('users')
            ->join('project_users', 'users.id', '=', 'project_users.user_id')
            ->where('project_users.project_id', $request->project_id)
            ->select('users.name', 'users.role')
            ->get();
            $tasks = Task::where('project_id', $request->project_id)
            ->get();
            $i = 1;
            $project_id = $request->project_id;
            return view('admin.project_users', compact('project_id', 'task_users', 'project_users', 'tasks', 'i'));
        }
        
}
