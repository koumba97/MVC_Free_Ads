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


Route::get('/', 'IndexController@showIndex');

Route::get('/registerUser', 'Utilisateur@create');


Route::resource('users', 'Utilisateur');

Route::post('registerUser', function(){

    $user = new App\users;
    $user->name = request('name');
    $user->surname = request('surname');
    $user->pseudo = request('pseudo');
    $user->email = request('email');
    $user->password = sha1(request('password'));
    $user->status = "OFF";
    //$user->email_verified_at = "null";
    //$user->subscrib_date = NOW();

    $user->save();
});

Auth::routes(['verify' => true]);

Route::get('protege', function () {
    return 'affichage de la route protégé';
})->middleware('verified');

Route::get('/home', 'HomeController@index')->name('home');
