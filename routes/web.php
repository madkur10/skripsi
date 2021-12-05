<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClinicController;

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/registrasi', [AuthController::class, 'registrasi'])->name('registrasi');
Route::post('/login_action', [AuthController::class, 'loginAction'])->name('login.action');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout.action');

Route::middleware(['auth'])->group(function () {
    Route::get('/', [AuthController::class, 'home'])->name('homepage');
    Route::prefix('pengguna')->group(function () {
        Route::get('/list', [UserController::class, 'list'])->name('users.list');
        Route::post('/store', [UserController::class, 'store'])->name('users.store');
    });
    Route::prefix('hakakses')->group(function () {
        Route::get('/list', [RoleController::class, 'list'])->name('role.list');
        Route::post('/store', [RoleController::class, 'store'])->name('role.store');
    });
    Route::prefix('klinik')->group(function () {
        Route::get('/list', [ClinicController::class, 'list'])->name('clinic.list');
        Route::post('/store', [ClinicController::class, 'store'])->name('clinic.store');
    });
});
