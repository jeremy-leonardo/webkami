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

// Route::get('/login', function () {
//     return view('login');
// });

Route::get('/login', 'Auth\LoginController@index')->name('loginPage');
// Route::get('/register', 'Auth\RegisterController@index')->name('registerPage');

Route::get('/register', function () {
    return view('auth.register');
});
Route::post('/register', 'Auth\RegisterController@create');

Route::get('/', function () {
    return view('home');
});


// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
