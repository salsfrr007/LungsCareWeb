<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;

Route::resource('articles', ArticleController::class);



Route::get('/login', function () {
    return view('login');
});
Route::post('/auth', [AuthController::class, 'login']);
Route::get('/dashboard', function () {
    // Cek session login admin
    if (!session('is_admin')) {
        return redirect('/login');
    }
    return view('dashboard');
});
Route::get('/profile', function () {
    // Cek session login admin (jika perlu)
    if (!session('is_admin')) {
        return redirect('/login');
    }
    return view('admin.profile');
});
Route::get('/logout', function () {
    session()->flush();
    return redirect('/login');
});