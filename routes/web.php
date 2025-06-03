<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Authentication Routes (Publicly Accessible)
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

// Protected Routes (Require Authentication)
Route::middleware(['auth'])->group(function () {
    Route::get('/home', function () {
        return view('dashboard'); // Or a dedicated 'home.blade.php'
    })->name('home');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('articles', ArticleController::class);

    Route::get('/user', [UserController::class, 'index'])->name('active.users');
    Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('active.users.delete');

    Route::get('/profile', function () {
        return view('admin.profile');
    })->name('profile');

    Route::get('/settings', function () {
        return view('settings');
    })->name('settings');
});

// Ensure old/conflicting routes are removed or commented out.
// The previously existing routes like Route::get('/login', ...), Route::post('/auth', ...), etc.
// that handled auth manually or used AuthController should be gone.