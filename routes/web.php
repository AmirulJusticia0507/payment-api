<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth; // Tambahkan ini
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware('auth');

Route::post('/payments', [PaymentController::class, 'store']);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
