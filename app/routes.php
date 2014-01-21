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

define('SLUG', '[A-Za-z0-9-]+');
define('ID',   '[A-Za-z0-9]+');
define('ANUM', '[A-Za-z0-9]+');
define('NUM',  '[0-9]+');

//auth
Route::get('login', ['as' => 'login', 'uses' => 'AuthController@login']);
Route::post('login', ['as' => 'login.do', 'uses' => 'AuthController@doLogin']);
Route::get('logout', ['as' => 'logout', 'uses' => 'AuthController@logout']);

//blog
Route::get('/{blog?}', ['uses' => 'PostController@blog'])
	->where('blog','blog');
Route::get('feed', ['as' => 'feed', 'uses' => 'PostController@feed']);

Route::group(['before' => 'auth'], function(){
	Route::get('dashboard', ['as' => 'dashboard', 'uses' => 'AuthController@dashboard']);

	Route::resource('posts','PostController');

	Route::get('blocks', ['as' => 'blocks.index', 'uses' => 'BlockController@index']);
	Route::get('blocks/create/{slug?}', ['as' => 'blocks.create', 'uses' => 'BlockController@create'])
		->where('slug', SLUG);
	Route::post('blocks', ['as' => 'blocks.store', 'uses' => 'BlockController@store']);

	Route::get('files', ['as' => 'files', 'uses' => 'FileController@index']);
	Route::get('files', ['as' => 'files.add', 'uses' => 'FileController@index']);
});

Route::get('{slug}/{id}', ['uses' => 'PostController@display'])
	->where(['slug' => SLUG, 'id' => ID]);

//blocks
Route::get('{slug}', ['as' => 'blocks.display', 'uses' => 'BlockController@display'])
	->where(['slug' => SLUG]);

