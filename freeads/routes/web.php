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


Route::get('/', 'HomeController@index');

Route::resource('user', 'ProfileController');
Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');



Route::middleware ('auth', 'verified')->group (function () {
    Route::resource ('profile', 'ProfileController', [
        'only' => ['edit', 'update', 'destroy', 'show'],
        'parameters' => ['profile' => 'user']
    ]);
});

Route::get("profile/{user}/show", 'ProfileController@show');
Route::post("profile/{user}/update_user", 'ProfileController@update');



Route::middleware ('auth', 'verified')->group (function () {

    Route::resource ('annonce', 'AnnoncesController', [
        'only' => ['add', 'edit', 'update', 'destroy', 'show'],
        
    ]);
});

Route::post("create_annonce", 'AnnoncesController@create');