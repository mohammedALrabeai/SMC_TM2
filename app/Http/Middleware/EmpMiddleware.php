<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class EmpMiddleware
{
    public function handle($request, Closure $next)
    {
        if (!Auth::guard('emp')->check()) {
            return redirect()->route('emp.login');
        }

        return $next($request);
    }
}
