<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
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
});

Route::get('/users/{user}', [UserController::class, 'index'])->name('profile');
