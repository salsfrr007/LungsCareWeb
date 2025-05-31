<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

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

Route::get('/articles', function () {
    return view('articles.index');
});
Route::get('/articles/create', function () {
    return view('articles.create');
});
Route::post('/articles/store', function () {
    // Simulasi penyimpanan artikel
    return redirect('/articles')->with('success', 'Artikel berhasil disimpan!');
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