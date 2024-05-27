<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IdeaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//dashboard routes
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/idea/{idea}', [IdeaController::class, 'show'])->name('idea.show');
Route::post('/idea', [IdeaController::class, 'store'])->name('idea.create');
Route::get('/idea/{idea}/edit', [IdeaController::class, 'edit'])->name('idea.edit')->middleware('auth');
Route::put('/idea/{idea}', [IdeaController::class, 'update'])->name('idea.update')->middleware('auth');
Route::delete('/idea/{idea}', [IdeaController::class, 'destroy'])->name('idea.destroy')->middleware('auth');

//comments route
Route::post('/idea/{idea}/comments', [CommentController::class, 'store'])->name('idea.comments.create')->middleware('auth');

//register routes
Route::get('/register', [authController::class, 'register'])->name('register');
Route::post('/register', [authController::class, 'store']);

//login routes
Route::get('/login', [authController::class, 'login'])->name('login');
Route::post('/login', [authController::class, 'authenticate']);
Route::post('/logout', [authController::class, 'logout'])->name('logout');

//profile route
Route::get('/profile', [ProfileController::class, 'index']);

//termos route
Route::get('/termos', function(){
    return view('termos');
});
