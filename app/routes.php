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
define('ID', '[a-zA-Z0-9]+');

//auth
Route::get('login', ['as' => 'login', 'uses' => 'AuthController@login']);
Route::post('login', ['as' => 'doLogin', 'uses' => 'AuthController@doLogin']);
Route::get('logout', ['as' => 'logout', 'uses' => 'AuthController@logout']);

//blog
Route::get('/', ['uses' => 'PostController@blog']);
Route::get('blog', ['uses' => 'PostController@blog']);
Route::get('feed/{tag?}', ['as' => 'feed', 'uses' => 'PostController@feed']);

Route::group(['before' => 'auth'], function(){
	Route::resource('posts','PostController');

	Route::get('blocks', ['as' => 'blocks.index', 'uses' => 'BlockController@index']);
	Route::get('blocks/create', ['as' => 'blocks.create', 'uses' => 'BlockController@create']);
	Route::post('blocks', ['as' => 'blocks.store', 'uses' => 'BlockController@store']);

	//Route::get('files', ['uses' => 'FileController@index']);
});

Route::get('{slug}/{id}', ['uses' => 'PostController@display'])
	->where(['slug' => SLUG, 'id' => ID]);



//blocks
Route::get('blocks/{id}', ['uses' => 'BlockController@get']);
//Route::get('{slug}', ['uses' => 'BlockController@display'])
//	->where(['slug' => SLUG]);

