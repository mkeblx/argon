<?php

class BlockTableSeeder extends Seeder {

	public function run()
	{
		Eloquent::unguard();

		$blocks = [
			[
				'name' => 'sidebar',
				'slug' => 'sidebar',
				'content' => 'sidebar',
				'created_at' => Date::now()
			],
			[
				'name' => 'header',
				'slug' => 'header',
				'content' => 'header',
				'created_at' => Date::now()
			],
			[
				'name' => 'footer',
				'slug' => 'footer',
				'content' => 'footer',
				'created_at' => Date::now()
			],
		];

		foreach ($blocks as $block) {
			DB::table('blocks')->insert($block);
		}
	}

}