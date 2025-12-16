<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CustomAuthenticate
{
    public function handle($request, Closure $next, $guard = null)
    {
        if (!Auth::guard($guard)->check()) {

            if ($guard === 'admin') {
                return redirect()->route('admin.login');
            }

            if ($guard === 'employee') {
                return redirect()->route('employee.login');
            }

            return redirect()->route('employee.login');
        }

        return $next($request);
    }
}
