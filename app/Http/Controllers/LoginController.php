<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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

    public function registrasi()
    {
        return view('login.registrasi');
    }

    public function simpanregistrasi(Request $request)
    {
        // dd($request->all());
        User::create([
            'name' => $request->name,
            'level' => 'karyawan',
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'remember_token' => Str::random(60)
        ]);

        return view('welcome');
    }
}
