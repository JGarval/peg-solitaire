<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// USERS

Route::get('/users', 'UserController@index');

Route::get('/users/{id}', 'UserController@show');

Route::put('/users/{id}', 'UserController@update');

Route::post('/users', 'UserController@store');

Route::delete('/users/{id}', 'UserController@destroy');

// GAMES
Route::get('/games', 'GameController@index');

Route::get('/games/{id}', 'GameController@show');

Route::put('/games/{id}', 'GameController@update');

Route::post('/games', 'GameController@store');

Route::delete('/games/{id}', 'GameController@destroy');