<?php

class PostTableSeeder extends Seeder {

	public function run()
	{
		Eloquent::unguard();

		return;
		$posts = [];

		DB::table('posts')->insert($posts);
	}

}