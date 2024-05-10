<?php

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

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/idea/{idea}', [IdeaController::class, 'show'])->name('idea.show');
Route::post('/idea', [IdeaController::class, 'store'])->name('idea.create');
Route::get('/idea/{idea}/edit', [IdeaController::class, 'edit'])->name('idea.edit');
Route::put('/idea/{idea}', [IdeaController::class, 'update'])->name('idea.update');
Route::delete('/idea/{idea}', [IdeaController::class, 'destroy'])->name('idea.destroy');

Route::post('/idea/{idea}/comments', [CommentController::class, 'store'])->name('idea.comments.create');

Route::get('/profile', [ProfileController::class, 'index']);

Route::get('/termos', function(){
    return view('termos');
});
