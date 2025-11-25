<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class studentAuthcontroller extends Controller
{
    //
    public function showLoginForm()
    {
        if(Auth::guard('student')->check())
        {
            return redirect()->route('student.dashboard');
        }
        return View('student.login');
    }

    public function login(Request $request)
    {
        $request->validate([ 
            'email'=>'required|email',
            'password'=>'required'
        ]);

        $credentials = $request->only('email','password');

        if(Auth::guard('student')->attempt($credentials))
        {
            $request->session()->regenerate();

            return redirect()->route('student.dashboard')
            ->with('success','welcome back'.Auth::guard('student')->user()->name);
        }
        return back()->withErrors([
            'email'=>'Invalid credentials! please try again.'
        ])->withInput($request->only('email'));

    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('student.login')
        ->with('success','logged out successfully');
    }
}
