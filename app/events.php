<?php

//events

Event::listen('user.login', function($user){
	//$user->last_login = new DateTime;
	//$user->save();
});

Event::listen('user.logout', function($user){

});

Event::listen('post.blog', function(){
	//Stat::create(...);
});

Event::listen('post.display', function($post){
	$stat = [
		'type' => 'posts',
		'type_id' => $post->id,
		'metric' => 'view',
		'ip' => Request::getClientIp(),
		'created_at' => Date::now()];

	Stat::insert($stat);
});

Event::listen('block.display', function($block){
	$stat = [
		'type' => 'blocks',
		'type_id' => $block->id,
		'metric' => 'view',
		'ip' => Request::getClientIp(),
		'created_at' => Date::now()];

	Stat::insert($stat);
});
