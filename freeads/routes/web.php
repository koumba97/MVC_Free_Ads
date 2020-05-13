<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


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
        'parameters' => ['annonce' => 'id']
        
    ]);
});

Route::post("create_annonce", 'AnnoncesController@create');

Route::get("/profile/annonce/edit/{id_annonce}", 'AnnoncesController@edit');
Route::post("/profile/annonce/update/{id_annonce}", 'AnnoncesController@update');
Route::get("/profile/annonce/delete/{id_annonce}", 'AnnoncesController@delete');

Route::get("search", ['as' => 'search', 'uses'=> 'AnnoncesController@search']);
Route::get("/type/{type}", 'AnnoncesController@type');



Route::middleware ('auth', 'verified')->group (function () {
    Route::get("/messagerie/{id_recept}", 'MessageController@show');

    Route::get('message', 'MessageController@fetchMessages');
    Route::post('message', 'MessageController@sendMessage');
});