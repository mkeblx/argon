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
define('ID', '[a-f0-9]+');

//auth
Route::get('login', ['uses' => 'AuthController@login']);
Route::post('login', ['uses' => 'AuthController@doLogin']);
Route::get('logout', ['uses' => 'AuthController@logout']);

//blog
Route::get('/', ['uses' => 'PostController@home']);
Route::get('/blog', ['uses' => 'PostController@blog']);
Route::get('{slug}/{id}', ['uses' => 'PostController@show'])
	->where(['slug' => SLUG, 'id' => ID]);

//Route::group(['before' => 'auth'], function(){
	Route::resource('posts','PostController');
//});