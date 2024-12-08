<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth/login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        // Cek di tabel admins
        if (Auth::guard('admins')->attempt($credentials)) {
            return redirect()->route('admin.dashboard');
        }

        // Cek di tabel users
        if (Auth::attempt($credentials)) {
            return redirect()->route('user.dashboard');
        }
        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('auth.login');
    }
}
