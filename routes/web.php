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

Route::get('/how-it-works', function () { return view('how-it-works'); });

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::get('/dashboard/developer/information/create', 'DeveloperInformationController@create');
Route::post('/dashboard/developer/information', 'DeveloperInformationController@store');
Route::get('/dashboard/developer/information/{id}/edit', 'DeveloperInformationController@edit');
Route::put('/dashboard/developer/information/{id}', 'DeveloperInformationController@update');

Route::get('/dashboard/client/information/create', 'ClientInformationController@create');
Route::post('/dashboard/client/information', 'ClientInformationController@store');
Route::get('/dashboard/client/information/{id}/edit', 'ClientInformationController@edit');
Route::put('/dashboard/client/information/{id}', 'ClientInformationController@update');

Route::get('/dashboard/client/project-details/create', 'ProjectDetailController@create');
Route::post('/dashboard/client/project-details', 'ProjectDetailController@store');

Route::get('/project-details', 'ProjectDetailController@index');
Route::get('/project-details/{id}', 'ProjectDetailController@show');
Route::get('/project-details/{id}/edit', 'ProjectDetailController@edit');
Route::put('/project-details/{id}/take', 'ProjectDetailController@take');
Route::put('/project-details/{id}', 'ProjectDetailController@update');
Route::put('/project-details/{project_id}/change-status/{target_project_status_id}', 'ProjectController@changeStatus');

Route::get('/coming-soon', function () { return view('coming-soon'); });

Route::get('/', function () { return view('home'); })->name('home');
Route::get('/home', function () { return view('home'); })->name('home');
// Route::get('/', 'HomeController@index')->name('home');



