<?php 

use App\Http\Controllers\authController;
use Illuminate\Support\Facades\Route;


//register routes
Route::get('/register', [authController::class, 'register'])->name('register');
Route::post('/register', [authController::class, 'store']);

//login routes
Route::get('/login', [authController::class, 'login'])->name('login');
Route::post('/login', [authController::class, 'authenticate']);
Route::post('/logout', [authController::class, 'logout'])->name('logout');