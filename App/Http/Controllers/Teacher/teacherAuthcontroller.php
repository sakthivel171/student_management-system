<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class teacherAuthcontroller extends Controller
{
    //
    public function showLoginForm()
    {
        if(Auth::guard('teacher')->check())
        {
            return redirect()->route('teacher.dashboard');
            
        }
        return view('teacher.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required',
        ]);

        $credentials = $request->only('email','password');

        if(Auth::guard('teacher')->attempt($credentials))
        {
            $request->session()->regenerate();
            return redirect()->route('teacher.dashboard')->with('success','Welcome back '.Auth::guard('teacher')->user()->name);
        }

        return back()->withErrors([
            'email'=>'Invalid credential! Please try again.'
        ])->withInput($request->only('email'));
    }

    public function logout(Request $request)
    {
        Auth::guard('teacher')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('teacher.login')
        ->with('success','logged out sucessfully');

    }
}
