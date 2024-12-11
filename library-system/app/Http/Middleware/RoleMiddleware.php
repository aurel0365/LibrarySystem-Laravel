<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {
        $user = session('user');
        if (!$user || $user->role !== $role) {
            return redirect('/login')->with('error', 'Unauthorized access.');
        }

        return $next($request);
    }



}
