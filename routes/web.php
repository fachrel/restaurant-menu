<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard')->middleware('auth');


Route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate');
Route::get('/login', [AuthController::class, 'index'])->name('login');

Route::get('/logout', [AuthController::class, 'logout'])->name(name: 'logout');

Route::resource('users', UserController::class)->middleware('auth');

Route::prefix('kategori')->name('kategori.')->group(function () {
    Route::get('/', [CategoryController::class, 'index'])->name('index');
    Route::get('add', [CategoryController::class, 'create'])->name('create');
    Route::post('add', [CategoryController::class, 'store'])->name('store');
    Route::get('edit{id}', [CategoryController::class, 'update'])->name('update');
    Route::put('prosesedit{id}', [CategoryController::class, 'prosesupdate'])->name('prosesupdate');
    Route::post('delete{id}', [CategoryController::class, 'delete'])->name('delete');
});