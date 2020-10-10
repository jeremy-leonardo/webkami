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
Route::get('/register', 'Auth\RegisterController@index')->name('registerPage');

Route::post('/register', 'Auth\RegisterController@create');
Route::post('/login', 'Auth\LoginController@login');
Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/', function () { return view('home'); })->name('homePage');
// Route::get('/', 'HomeController@index')->name('homePage');

Route::get('/features', function () { return view('coming-soon'); });
Route::get('/how-it-works', function () { return view('coming-soon'); });

Auth::routes();

Route::get('/dashboard', function () { return view('coming-soon'); });


