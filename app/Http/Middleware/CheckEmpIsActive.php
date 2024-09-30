<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckEmpIsActive
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // الحصول على الموظف المسجل حاليا
        $user = Auth::guard('emp')->user();
        // dd($user);

        // التحقق إذا كان الموظف غير مفعل
        if ($user && !$user->is_active) {
            Auth::logout(); // تسجيل خروج الموظف
            return redirect()->to('/app/login')->withErrors([
                'email' => 'Your account is disabled.',
            ]);
            
        }

        return $next($request);
    }
}
