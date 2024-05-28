<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
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

//dashboard route
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

//ideas routes
Route::resource('idea', IdeaController::class)->except(['index', 'create', 'show'])->middleware('auth');
Route::resource('idea', IdeaController::class)->only(['show']);

//comments route
Route::resource('idea.comments', CommentController::class)->only(['store'])->middleware('auth');

//users route
Route::resource('users', UserController::class)->only(['show', 'edit', 'update'])->middleware('auth');

Route::get('profile', [UserController::class, 'profile'])->middleware('auth')->name('profile');

//terms route
Route::get('/terms', function(){
    return view('terms');
});
