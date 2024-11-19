<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Faker\Provider\Lorem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class TaskController extends Controller
{
    public $project_id;
    public function tasks_page($project_id){
        $project = Project::where('id', $project_id)
        ->first();
        $tasks = Task::where('project_id', $project_id)
        ->get();
        $users = DB::table('users')
        ->join('task_users', 'users.id', '=', 'task_users.user_id')
        ->select('users.name', 'task_users.task_id')
        ->get();
        return view('admin.tasks', compact('project', 'tasks', 'users'));
    }
    public function create_tasks_page($project_id){
        $project_name = Project::where('id', $project_id)
        ->value('name');
        $this->project_id = $project_id;
        return view('admin.create_tasks', compact('project_id', 'project_name'));
    }
    public function create_task(Request $request){
        $validate = $request->validate([
            'title'=>'required',
            'description'=>'required',
            'priority'=>'required',
            'term'=>'required',
            'status'=>'required'
        ]);

        $create_task = Task::create([
            'project_id'=>$request->project_id,
            'title'=>$request->title,
            'description'=>$request->description,
            'priority'=>$request->priority,
            'term'=>$request->term,
            'statut'=>$request->status
        ]);
        return $this->tasks_page($request->project_id);
    }
    public function detail_task_page($task_id, $project_id){
        $tasks = Task::where('project_id', $project_id)
        ->get(); 
        return view('admin.detail_task', compact('project_id', 'tasks'));
    }
    public function edit_task(Request $request){
        $validate = $request->validate([
            'title'=>'required',
            'description'=>'required',
            'priority'=>'required',
            'term'=>'required',
            'status'=>'required'
        ]);
        $edit_task = Task::where('id', $request->task_id)
        ->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'priority'=>$request->priority,
            'term'=>$request->term,
            'status'=>$request->status
        ]);
        return redirect()->route('tasks_page', $request->project_id);
    }
    public function task_search(Request $request, $project_id){
        $project = Project::where('id', $project_id)
        ->first();
        $tasks = Task::where('title', 'like', '%' . $request->task_name . '%')
            ->where('project_id', $project_id)
            ->get();
        $users = DB::table('users')
            ->join('task_users', 'users.id', '=', 'task_users.user_id')
            ->select('users.name', 'task_users.task_id')
            ->get();

        return view('admin.tasks', compact('project', 'tasks', 'users'));
    }
} 
