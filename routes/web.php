<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectUserController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskUserController;
use App\Http\Controllers\UserController;
use App\Models\Comment;
use App\Models\Notification;
use Illuminate\Support\Facades\Route;


Route::controller(ProjectController::class)->middleware('auth')->group(function(){
    Route::get('/projects', 'projects')->name('projects');
    Route::get('/create_project_page', 'create_project_page')->name('create_project_page');
    Route::post('/create_project', 'create_project')->name('create_project');
    Route::get('/project_search', 'project_search')->name('project_search');
});
Route::controller(TaskController::class)->middleware('auth')->group(function(){
    Route::get('/tasks_page/{project_id}', 'tasks_page')->name('tasks_page');
    Route::get('/create_tasks_page/{project_id}', 'create_tasks_page')->name('create_tasks_page');
    Route::post('/create_task', 'create_task')->name('create_task');
    Route::get('/detail_task_page/{task_id}/{project_id}', 'detail_task_page')->name('detail_task_page');
    Route::post('/edit_task', 'edit_task')->name('edit_task');
    Route::get('/task_search/{project_id}', 'task_search')->name('task_search');
});
Route::controller(ProjectUserController::class)->middleware('auth')->group(function(){
    Route::get('/assign_project_users_page/{project_id}/{task_id?}', 'assign_project_users_page')->name('assign_project_users_page');
    Route::post('/assign_project_users', 'assign_project_users')->name('assign_project_users');
});
Route::controller(TaskUserController::class)->middleware('auth')->group(function(){
    Route::get('/assign_task_users_page/{project_id}', 'assign_task_users_page')->name('assign_task_users_page');
    Route::post('/assign_task_users', 'assign_task_users')->name('assign_task_users');
    Route::get('/project_users_page/{project_id}', 'project_users_page')->name('project_users_page');
    Route::post('/search_task_users', 'search_task_users')->name('search_task_users');
});
Route::controller(CommentController::class)->middleware('auth')->group(function(){
    Route::get('/comments_page/{task_id}', 'comments_page')->name('comments_page');
    Route::get('/user_comments_page/{task_id}', 'user_comments_page')->name('user_comments_page');
    Route::post('/leave_comment', 'leave_comment')->name('leave_comment');
});
Route::controller(AuthController::class)->group(function(){
    Route::get('/', 'login_page')->name('login_page');
    Route::get('/register_page', 'register_page')->name('register_page');
    Route::post('/register', 'register')->name('register');
    Route::post('/loginstore', 'loginstore')->name('loginstore');
    Route::get('/logout', 'logout')->name('logout');
});
Route::controller(UserController::class)->middleware('auth')->group(function(){
    Route::get('/user/projects', 'user_projects_page')->name('user_projects_page');
    Route::get('/user/user_tasks', 'user_tasks')->name('user_tasks');
    Route::get('/users', 'users')->name('users');
    Route::post('/select_admin', 'select_admin')->name('select_admin');
});
Route::controller(NotificationController::class)->middleware('auth')->group(function(){
    Route::get('/send_message_page', 'send_message_page')->name('send_message_page');
    Route::post('/send_message', 'send_message')->name('send_message');
    Route::get('/notification_page', 'notification_page')->name('notification_page');
});

