<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
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
    return view('logout');
});
Route::post('/logout', function () {
    // Hapus session login
    session()->forget('is_admin');
    // Redirect ke halaman login
    return redirect('/login');
})->name('logout');

Route::get('/dashboard', function () {
    if (!session('is_admin')) {
        return redirect('/login');
    }
    return view('dashboard');
})->name('dashboard');

Route::get('/user', [UserController::class, 'index'])->name('active.users');
Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('active.users.delete');

// Admin Routes
Route::get('/settings', function () {
    return view('settings');
})->name('settings');