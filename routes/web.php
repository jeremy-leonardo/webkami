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

Route::get('/login', 'Auth\LoginController@index')->name('login');
Route::post('/login', 'Auth\LoginController@login');
Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/register', 'Auth\RegisterController@index')->name('register');
Route::post('/register', 'Auth\RegisterController@create');

Route::get('/features', function () { return view('coming-soon'); });
Route::get('/how-it-works', function () { return view('coming-soon'); });

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::get('/dashboard/developer/information/create', 'DeveloperInformationController@create');
Route::post('/dashboard/developer/information', 'DeveloperInformationController@store');

Route::get('/dashboard/client/information/create', 'ClientInformationController@create');
Route::get('/coming-soon', function () { return view('coming-soon'); });

Route::get('/', function () { return view('home'); })->name('home');
Route::get('/home', function () { return view('home'); })->name('home');
// Route::get('/', 'HomeController@index')->name('home');



