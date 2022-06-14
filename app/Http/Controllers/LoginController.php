<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index', [
            'title' => 'Login'
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->with('loginError','Login failed!');
    }

    public function user()
    {
        return view('login.layanan', [
            'title' => 'Login'
        ]);
    }

    public function layanan(Request $request)
    {
        $credentials = $request->validate([
            'nik' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/layanan');
        }

        return back()->with('loginError','Login failed!');
    }



    public function logout()
        {
            Auth::logout();

            request()->session()->invalidate();

            request()->session()->regenerateToken();
            
            return redirect('/');
        }   

}
