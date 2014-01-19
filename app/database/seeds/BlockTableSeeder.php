<?php

class BlockTableSeeder extends Seeder {

	public function run()
	{
		Eloquent::unguard();

		$blocks = [
			[
				'name' => 'sidebar',
				'slug' => 'sidebar',
				'content' => 'sidebar'
			],
			[
				'name' => 'header',
				'slug' => 'header',
				'content' => 'header'
			],
			[
				'name' => 'footer',
				'slug' => 'footer',
				'content' => '&copy; '.Date::format('Y')
			],
		];

		DB::table('blocks')->insert($blocks);
	}

}