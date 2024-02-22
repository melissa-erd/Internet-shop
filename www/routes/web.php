<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProductionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [MainController::class, 'index']);
Route::get('/registration', [AuthController::class, 'registerPage']);
Route::get('/login', [AuthController::class, 'loginPage']);
Route::post('/registration', [AuthController::class, 'registration'])->name('auth.registration');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');

Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
//жанры
    Route::get('/genres', [GenreController::class, 'index'])->name('genres.index');
    Route::post('/genres/create', [GenreController::class, 'store'])->name('genres.store');
    Route::get('/genres/{genre}', [GenreController::class, 'destroy'])->name('genres.destroy');

//постановки
    Route::get('/productions', [ProductionController::class, 'index'])->name('productions.index');
    Route::post('/productions/create', [ProductionController::class, 'store'])->name('productions.store');
    Route::get('/productions/{production}', [ProductionController::class, 'destroy'])->name('productions.destroy');
    Route::get('/productions/{production}/edit', [ProductionController::class, 'edit'])->name('productions.edit');
    Route::put('/productions/{production}', [ProductionController::class, 'update'])->name('productions.update');
});

Route::get('/users/{user}', [UserController::class, 'index'])->name('profile');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
