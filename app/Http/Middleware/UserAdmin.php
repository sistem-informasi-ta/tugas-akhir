<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $route = $request->route()->getName();

            // Admin tidak boleh ke route 'home'
            if ($user->role === 'admin' && $route === 'home') {
                return redirect()->route('admin.dashboard');
            }

            // User tidak boleh ke route 'admin.dashboard'
            if ($user->role === 'user' && $route === 'admin.dashboard') {
                return redirect()->route('home');
            }
        }

        // Prevent cache-back
        $response = $next($request);
        return $response->header('Cache-Control', 'no-cache, no-store, max-age=0, must-revalidate')
                        ->header('Pragma', 'no-cache')
                        ->header('Expires', 'Sat, 01 Jan 1990 00:00:00 GMT');
    }
}
