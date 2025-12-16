<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeAuth
{
public function handle($request, Closure $next)
{
    if (!Auth::guard('employee')->check()) {
        return redirect()->route('employee.login');
    }

    return $next($request);
}

protected function redirectTo($request)
{
    return route('employee.login');
}


    }
