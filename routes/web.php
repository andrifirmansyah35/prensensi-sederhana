<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/login', [LoginController::class, 'halamanlogin'])->name('login');
Route::post('/postlogin', [LoginController::class, 'postlogin'])->name('postlogin');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Membuat hak akses(5.0)
// - user yang sudah login barulah dapat mengakses home
//   ## membuat group middleware
// - membuat middleware c ekLevel 
// - menambaakan pada kernel 


Route::group(['middleware' => ['auth', 'ceklevel:admin,karyawan']], function () {   //level karyawan dapat masuk ke halaman Home
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

Route::get('/registrasi', [LoginController::class, 'registrasi'])->name('registrasi');
Route::post('/simpanregistrasi', [LoginController::class, 'simpanregistrasi'])->name('simpanregistrasi');
