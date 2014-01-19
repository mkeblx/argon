<?php

class PostTableSeeder extends Seeder {

	public function run()
	{
		Eloquent::unguard();

		return;
		$posts = [
			[
			'title' => 'Argon the noblest gas',
			'slug' => 'argon',
			'content' => '<p>Argon is a chemical element with symbol Ar and atomic number 18. It is in group 18 of the periodic table and is a noble gas. Argon is the third most common gas in the Earth\'s atmosphere, at 0.93%.</p>',
			'status' => 'final',
			'published_at' => Date::now()]
		];

		DB::table('posts')->insert($posts);
	}

}