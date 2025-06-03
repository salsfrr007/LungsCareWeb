<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Ambil input dari form
        $username = $request->input('username');
        $password = $request->input('password');

        // Hardcode username dan password admin
        $adminUsername = 'salma';
        $adminPassword = 'password';

        // Cek apakah sesuai
        if ($username === $adminUsername && $password === $adminPassword) {
            // Simpan session login (opsional)
            session(['is_admin' => true]);
            // Redirect ke dashboard/home setelah login sukses
            return redirect('/dashboard')->with('loginSuccess', true);
        } else {
            // Jika salah, kembali ke login dengan pesan error
            return back()->with('loginError', 'Username atau password salah!');
        }
    }

    public function auth(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect('/home');
        } else {
            return back()->withErrors(['msg' => 'Email atau password salah!']);
        }
    }

    public function registration()
    {
        return view('registration');
    }


    public function home()
    {
        if (Auth::check()) {
            return view('dashboard', ['user' => Auth::user()]);
        } else {
            return redirect('/login');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}