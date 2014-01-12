<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

define('SLUG','[A-Za-z0-9-]+');

//users
Route::get('login', ['uses' => 'AuthController@login']);
Route::post('login', ['uses' => 'AuthController@doLogin']);
Route::get('logout', ['uses' => 'AuthController@logout']);

//blog
Route::get('/', ['uses' => 'PostController@index']);
Route::get('/blog', ['uses' => 'PostController@index']);

Route::resource('posts','PostController');
Route::get('post/{slug}', ['uses' => 'PostController@display'])
	->where('slug', SLUG);