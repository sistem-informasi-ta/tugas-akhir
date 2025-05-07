<?php


namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect('/'); // Belum login
        }

        // Jika role bukan admin atau user, redirect
        if (!in_array(Auth::user()->role, ['admin', 'user'])) {
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}
