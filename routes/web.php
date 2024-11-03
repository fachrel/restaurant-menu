<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard')->middleware('auth');


Route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate');
Route::get('/login', [AuthController::class, 'index'])->name('login');

Route::get('/logout', [AuthController::class, 'logout'])->name(name: 'logout');