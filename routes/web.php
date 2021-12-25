<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ModulController;
use App\Http\Controllers\ClinicController;
use App\Http\Controllers\RegistrationController;

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/registrasi', [AuthController::class, 'registrasi'])->name('registrasi');
Route::post('/login_action', [AuthController::class, 'loginAction'])->name('login.action');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout.action');


Route::post('/registrasi_action', [RegistrationController::class, 'registrasiAction'])->name('registrasi.action');
Route::get('/check_username', [RegistrationController::class, 'checkUsername']);

Route::middleware(['auth'])->group(function () {
    Route::get('/', [AuthController::class, 'home'])->name('homepage');
    Route::prefix('pengguna')->group(function () {
        Route::get('/list', [UserController::class, 'list'])->name('users.list');
        Route::post('/store', [UserController::class, 'store'])->name('users.store');
        Route::patch('/update', [UserController::class, 'update'])->name('users.update');
        Route::get('/delete', [UserController::class, 'delete'])->name('users.delete');
    });
    Route::prefix('hakakses')->group(function () {
        Route::get('/list', [RoleController::class, 'list'])->name('role.list');
        Route::post('/store', [RoleController::class, 'store'])->name('role.store');
    });
    Route::prefix('klinik')->group(function () {
        Route::get('/list', [ClinicController::class, 'list'])->name('clinic.list');
        Route::post('/store', [ClinicController::class, 'store'])->name('clinic.store');
        Route::patch('/update', [ClinicController::class, 'update'])->name('clinic.update');
        Route::get('/delete', [ClinicController::class, 'delete'])->name('clinic.delete');
    });
    Route::prefix('modul')->group(function () {
        Route::get('/list', [ModulController::class, 'list'])->name('modul.list');
        Route::post('/store', [ModulController::class, 'store'])->name('modul.store');
        Route::patch('/update', [ModulController::class, 'update'])->name('modul.update');
        Route::get('/delete', [ModulController::class, 'delete'])->name('modul.delete');
    });
    Route::prefix('menu')->group(function () {
        Route::get('/list', [MenuController::class, 'list'])->name('menu.list');
        Route::post('/store', [MenuController::class, 'store'])->name('menu.store');
        Route::patch('/update', [MenuController::class, 'update'])->name('menu.update');
        Route::get('/delete', [MenuController::class, 'delete'])->name('menu.delete');
    });
});
