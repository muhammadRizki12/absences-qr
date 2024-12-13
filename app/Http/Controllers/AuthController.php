<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // register
    // show register form
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // procces register
    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        // Registrasi hanya untuk role guru
        $user = UserModel::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'guru', // Set role guru untuk pengguna ini
        ]);

        return redirect()->route('auth.login')->with('success', 'Registrasi berhasil. Silakan login!');
    }

    // show login form
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // procces login
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Jika admin login
            if ($user->role === 'admin') {
                return redirect()->route('dashboardadmin');
            }

            // Jika guru login
            if ($user->role === 'guru') {
                return redirect()->route('dashboardguru');
            }
        }

        return back()->withErrors(['msg' => 'Username atau Password salah']);
    }

    // Halaman Dashboard
    public function dashboardadmin()
    {
        $data = [
            'total_guru' => 50,
            'hadir' => 30,
            'terlambat' => 0,
        ];
        return view('dashboard/dashboardadmin', $data);
    }

    public function dashboardguru()
    {
        return view('dashboard.dashboardguru');
    }

    public function about()
    {
        return view('about');
    }

    public function dataguru()
    {
        return view('dataguru');
    }

    // Logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('auth.loginForm');
    }
}
