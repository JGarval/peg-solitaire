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

Route::get('score', 'GameController@score')
    ->name('score');

Route::get('about', function () { return view('about'); })
    ->name('about');

Route::get('profile', 'HomeController@index')
    ->name('profile')
    ->middleware('auth');

Route::get('play', 'GameController@play')
    ->name('play')
    ->middleware('auth');

Route::get('place', 'GameController@place')
    ->name('place')
    ->middleware('auth');

Route::get('admin', 'UserController@isAdmin')
    ->name('admin')
    ->middleware('auth');

Route::get('edit/{id}', 'UserController@editUser')
    ->name('edit')
    ->middleware('auth');