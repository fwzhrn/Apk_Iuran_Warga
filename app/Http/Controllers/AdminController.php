<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function showAdminLoginForm()
    {
        return view('admin.login');
    }
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function adminLogin(Request $request)
    {
        $credentials = $request->only('username', 'password');
        $credentials['level'] = 'admin';

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/administrator/dashboard'); 
        }

        return back()->with('error', 'Username atau password salah!');
    }
}
