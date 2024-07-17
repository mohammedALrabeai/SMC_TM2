<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmpLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.emp-login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('emp')->attempt($request->only('email', 'password'))) {
            return redirect()->route('emp.dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout()
    {
        Auth::guard('emp')->logout();
        return redirect()->route('emp.login');
    }
}

