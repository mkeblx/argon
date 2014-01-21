<?php

//user tracking
Event::listen('user.login', function($user){
	$user->last_login = new DateTime;
	$user->save();
});

Event::listen('user.logout', function($user){

});


//stats
Event::listen('post.blog', function(){
	$stat = [
		'type' => 'blog',
		'type_id' => 0,
		'metric' => 'view',
		'ip' => Request::getClientIp(),
		'created_at' => Date::now()];

	Stat::create($stat);
});

Event::listen('post.display', function($post){
	$stat = [
		'type' => 'posts',
		'type_id' => $post->id,
		'metric' => 'view',
		'ip' => Request::getClientIp(),
		'created_at' => Date::now()];

	Stat::create($stat);
});

Event::listen('block.display', function($block){
	$stat = [
		'type' => 'blocks',
		'type_id' => $block->id,
		'metric' => 'view',
		'ip' => Request::getClientIp(),
		'created_at' => Date::now()];

	Stat::create($stat);
});
