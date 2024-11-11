<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    public function comments_page($task_id){
        $comments = DB::table('comments')
        ->join('users', 'comments.user_id', '=', 'users.id')
        ->join('tasks', 'comments.task_id', '=', 'tasks.id')
        ->where('comments.task_id', $task_id)
        ->select('comments.comment', 'comments.date', 'users.name', 'users.role', 'tasks.title', 'comments.task_id as task_id')
        ->get();
        $title = $comments[0]->title;
        return view('admin.comments', compact('comments', 'title'));
    }
    public function user_comments_page($task_id){
        $comments = DB::table('comments')
        ->join('users', 'comments.user_id', '=', 'users.id')
        ->join('tasks', 'comments.task_id', '=', 'tasks.id')
        ->where('comments.task_id', $task_id)
        ->select('comments.comment', 'comments.date', 'users.name', 'users.role', 'tasks.title', 'comments.task_id as task_id')
        ->get();
        $title = $comments[0]->title;
        return view('user.user_comments', compact('comments', 'title'));
    }
    public function leave_comment(Request $request){
        $validate = $request->validate([
            'comment'=>'required'
        ]);
        $comment = Comment::create([
            'user_id'=>Auth::user()->id,
            'task_id'=>$request->task_id,
            'comment'=>$request->comment,
            'date'=>date('Y-m-d H:i:s')
        ]);
        if(Auth::user()->role == 'admin'){
        return redirect()->route('comments_page', $request->task_id); 
        }
        return redirect()->route('user_comments_page', $request->task_id);
    }
}
