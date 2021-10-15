<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function halamanlogin()
    {
        return view('login.login-aplikasi');
    }

    public function postlogin(Request $request)
    {
        // Ctt : jadi loginnya berdasarkan email dan password 
        //      - jika benar maka akan ke halaman home
        //      - jika salah maka akan kehalaman awal
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect('/home');
        }
        return redirect('/');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
