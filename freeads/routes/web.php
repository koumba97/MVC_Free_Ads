<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    $index = new App\Http\Controllers\Auth\IndexController();
    $index -> showIndex();
});

Route::get('/register', function () {
    $index = new App\Http\Controllers\Auth\RegisterController();
    $index -> showRegister();
});

Route::get('/login', function () {
    $index = new App\Http\Controllers\Auth\LoginController();
    $index -> showLogin();
});
