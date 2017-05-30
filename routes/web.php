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

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('home', 'HomeController@index')
    ->name('home')
    ->middleware('auth');

Route::get('play', 'GameController@play')
    ->name('play')
    ->middleware('auth');

Route::get('place', 'GameController@place')
    ->name('place')
    ->middleware('auth');

Route::get('score', 'GameController@score')
    ->name('score');

Route::get('about', function () { return 'About'; })
    ->name('about');

Route::get('admin', 'AdminController@isAdmin')
    ->middleware('auth');