<?php

//events

Post::saving(function($post){
	$post->slug = Str::slug($post->title);
});

Event::listen('user.login', function($user){
	//$user->last_login = new DateTime;
	//$user->save();
});

Event::listen('user.logout', function($user){

});

Event::listen('post.blog', function(){
	//record stats
	//Stat::create(...);
});

Event::listen('post.display', function($post){

	//record views of post
	//time, ip, etc
	//Stat::create(...);

});
