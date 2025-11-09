<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
Route::get('/dash', function () {
    return view('LARAVEL_PROJECT.dashboards.main_dashboard');
})->name('main-dash');
Route::get('/', function () {
    return view('LARAVEL_PROJECT.dashboards.index_dashboard');
})->name('index-dash');
Route::get('/admin',function(){
    return view('admin');
});