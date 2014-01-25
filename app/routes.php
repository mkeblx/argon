<?php

define('SLUG',  '[A-Za-z0-9-]+');
define('ID',    '[A-Za-z0-9]+');
define('ALPHA', '[A-Za-z]+');
define('NUM',   '[0-9]+');
define('ANUM',  '[A-Za-z0-9]+');
define('HEX',   '[A-Fa-f0-9]+');

//auth
Route::get('login', ['as' => 'login', 'uses' => 'AuthController@login']);
Route::post('login', ['as' => 'login.do', 'uses' => 'AuthController@doLogin']);
Route::get('logout', ['as' => 'logout', 'uses' => 'AuthController@logout']);

//blog
Route::get('/{blog?}', ['uses' => 'PostController@blog'])
	->where('blog','blog');
Route::get('feed', ['as' => 'feed', 'uses' => 'PostController@feed']);


//admin
Route::group(['before' => 'auth'], function(){
	Route::get('dashboard', ['as' => 'dashboard', 'uses' => 'AuthController@dashboard']);

	Route::resource('posts','PostController');

	Route::get('blocks', ['as' => 'blocks.index', 'uses' => 'BlockController@index']);
	Route::get('blocks/create/{slug?}', ['as' => 'blocks.create', 'uses' => 'BlockController@create'])
		->where('slug', SLUG);
	Route::post('blocks', ['as' => 'blocks.store', 'uses' => 'BlockController@store']);

	Route::get('tags', ['as' => 'tags', 'uses' => 'TagController@index']);

	Route::get('files', ['as' => 'files', 'uses' => 'FileController@index']);
	Route::any('files/add', ['as' => 'files.add', 'uses' => 'FileController@add']);
});


Route::get('tag/{slug}', ['as' => 'tags.show', 'uses' => 'TagController@show'])
	->where('slug', SLUG);

Route::get('{slug}/{id}', ['uses' => 'PostController@display'])
	->where(['slug' => SLUG, 'id' => ID]);

//blocks
Route::get('{slug}', ['as' => 'blocks.display', 'uses' => 'BlockController@display'])
	->where(['slug' => SLUG]);

