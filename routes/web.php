<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home', [
        "title" => "Home"
    ]);
});

Route::get('/profil', function () {
    return view('profil', [
        "title" => "Profil",
        "name" => "Muhammad Kurniawan",
        "nim" => "12207006",
        "image" => "profil_image.jpg"
    ]);
});

Route::get('/blog', function () {
    return view('posts', [
        "title" => "Posts"
    ]);
});
