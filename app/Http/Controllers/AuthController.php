<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register_page(){
        return view('auth.register');
    }
    public function register(Request $request){
        $validate = $request->validate([
            'name'=>'required|min:3',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:3',
            'password_confirmation'=>'required|min:3',
        ]);
        if($request->password == $request->password_confirmation){
        $register = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password,
            'role'=>'contributor'
        ]);
        Auth::login($register);
        return redirect()->route('user_projects_page');
        }else{
            return $this->register_page()->with('not equal the password');
        }
    }
    public function login_page(){
        return view('auth.login');
    }
    public function loginstore(Request $request){
        $user = $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);
        if(Auth::attempt($user)){
            if(Auth::user()->role == 'contributor'){
                $request->session()->regenerate();
                return redirect()->route('user_projects_page');
            }elseif(Auth::user()->role == 'admin'){
                $request->session()->regenerate();
                return redirect()->route('projects');
            }
         }
         return back();
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login_page');
    }
}