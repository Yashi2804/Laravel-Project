<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
Route::get('/dash', function () {
    return view('LARAVEL_PROJECT.dashboards.main_dashboard');
})->name('main-dash');


Route::get('/', function () {
    return view('LARAVEL_PROJECT.dashboards.index_dashboard');
})->name('index-dash');

// ----------admin route----------
Route::get('/admin',function(){
    return view('admin');
});

// -------for Authentication--------- 

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'manualLogin'])->name('login.submit');

Route::get('/dashboard', function () {
    if (!session()->has('user')) {
        return redirect('/login')->with('error', 'Please login first.');
    }
    return view('LARAVEL_PROJECT.dashboards.main_dashboard');
});

Route::get('/logout', function () {
    session()->forget('user');
    return redirect('/login')->with('success', 'Logged out successfully.');
})->name('logout');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

