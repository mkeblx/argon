<?php

class PostTableSeeder extends Seeder {

	public function run()
	{
		Eloquent::unguard();

		$posts = [
			[
			'title' => 'Argon the noble',
			'slug' => 'argon-the-noble',
			'content' => '<p>Argon is a chemical element with symbol Ar and atomic number 18. It is in group 18 of the periodic table and is a noble gas. Argon is the third most common gas in the Earth\'s atmosphere, at 0.93%.</p>',
			'status' => 'final',
			'published_at' => Date::now(),
			'created_at' => Date::now(),
			'updated_at' => Date::now()]
		];

		DB::table('posts')->insert($posts);
	}

}