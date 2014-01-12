<?php

class PostTableSeeder extends Seeder {

	public function run()
	{
		Eloquent::unguard();

		$posts = [];

		DB::table('posts')->insert($posts);
	}

}