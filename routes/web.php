<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login_action', [AuthController::class, 'loginAction'])->name('login.action');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout.action');

Route::middleware(['auth'])->group(function () {
    Route::get('/', [AuthController::class, 'home'])->name('homepage');
    Route::prefix('pengguna')->group(function () {
        Route::get('/list', [UserController::class, 'list'])->name('list.users');
    });
});
