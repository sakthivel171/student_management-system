<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class authcontroller extends Controller
{
    //
    public function showLoginForm()
    {
        if(Auth::guard('admin')->check())
        {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.login');
    }


    public function login(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required',
        ]);

        $credentials= $request->only('email','password');

        if(Auth::guard('admin')->attempt($credentials))
        { 
            $request->session()->regenerate();
            
            return redirect()->route('admin.dashboard')
            ->with('success','Welcome back'. Auth::guard('admin')->user()->name);
        }
        return back()->withErrors([
            'email'=>'Invalid credential! Please try again.'
        ])->withInput($request->only('email'));
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login')
        ->with('success','logged out sucessfully');
    }
}
