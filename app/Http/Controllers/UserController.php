<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use function Pest\Laravel\get;

class UserController extends Controller
{
    public function user_projects_page(){
        $user_id = Auth::user()->id;
        $projects = DB::table('projects')
        ->join('project_users', 'projects.id', '=', 'project_users.project_id')
        ->where('project_users.user_id', $user_id)
        ->select('projects.*')
        ->get();
        return view('user.projects', compact('projects'));
    }
    public function user_tasks(){
        $tasks = DB::table('tasks')
        ->join('task_users', 'tasks.id', '=', 'task_users.task_id')
        ->where('task_users.user_id', Auth::user()->id)
        ->select('tasks.*')
        ->get();
        $users = DB::table('users')
        ->join('task_users', 'users.id', '=', 'task_users.user_id')
        ->select('users.name', 'task_users.task_id')
        ->get();
        return view('user.user_tasks', compact('tasks', 'users'));
    }
    public function users(){
        $contributors = User::where('role', 'contributor')->get();
        $users = User::all();
        $i = 1;
        return view('admin.users', compact('users', 'contributors', 'i'));
    }
    public function select_admin(Request $request){

        $validate = $request->validate([
            'user_id'=>'required|array',
            'user_id.*'=>'integer'
        ]);
        foreach($request->user_id as $id){
            $user = User::find($id);
            if($user){
                $user->update([
                    'role'=>'admin'
                ]);
            }
        }
        return $this->users();
    }
}
