<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    
    public function handle(Request $request, Closure $next, $role): Response
    {
        if (Auth::check()) {
            if ($role == 'admin' && Auth::user()->role == 'admin') {
                return $next($request); 
            }

            if ($role == 'contributor' && Auth::user()->role == 'contributor') {
                return $next($request); 
            }

            if (Auth::user()->role == 'admin') {
                return redirect()->route('admin_dashboard'); 
            }

            if (Auth::user()->role == 'contributor') {
                return redirect()->route('contributor_dashboard'); 
            }
        }

        return redirect()->route('login_page');
    }
}

