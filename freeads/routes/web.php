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
    return view('welcome');
});

Route::resource('user', 'ProfileController');
Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');



// Route::get('profileEdit', function () {
//     return view('profile/profileEdit');
// })->middleware('verified');


Route::middleware ('auth', 'verified')->group (function () {
    Route::resource ('profile', 'ProfileController', [
        'only' => ['edit', 'update', 'destroy', 'show'],
        'parameters' => ['profile' => 'user']
    ]);


    

});

Route::get("profile/{user}/show", 'ProfileController@show');
//})->middleware('verified');
//Route::get('profile/{user}/edit', 'ProfileController@edit');
Route::post("profile/{user}/update", 'ProfileController@update');