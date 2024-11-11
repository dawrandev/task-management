<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NotificationController extends Controller
{
    public function send_message_page(){
        $projects = User::where('role', 'contributor')->get();
        return view('admin.send_message', compact('projects'));
    }
    public function send_message(Request $request){
        $validate = $request->validate([
            'message'=>'required'
        ]);

        $message = Notification::create([
            'sent_user_id'=>Auth::user()->id,
            'receiver_id'=>$request->project_id,
            'message'=>$request->message,
            'status'=>0,
            'sent_at'=>now()
        ]);
        return redirect()->route('send_message_page');
    }
    public function notification_page(){
        
        $notifications = DB::table('notifications')
        ->join('users as sent_user', 'notifications.sent_user_id', '=', 'sent_user.id')
        ->join('users as receiver', 'notifications.receiver_id', '=', 'receiver.id')  
        ->select(
            'notifications.id',
            'notifications.message',
            'notifications.status',
            'notifications.sent_at',
            'sent_user.name as sent_user_name',  
            'receiver.name as receiver_name'    
        )
        ->get();
        return view('user.notification', compact('notifications'));
    }
}
