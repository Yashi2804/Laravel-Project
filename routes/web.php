<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/hello', function(){
    return view('hello');
});
Route::get('/dash', function () {
    return view('LARAVEL_PROJECT.dashboards.main_dashboard');
})->name('main-dash');
Route::get('/index', function () {
    return view('LARAVEL_PROJECT.dashboards.index_dashboard');
})->name('index-dash');


Route::get('/admin',function(){
    return view('admin');
});