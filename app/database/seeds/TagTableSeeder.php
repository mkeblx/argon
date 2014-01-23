<?php

class TagTableSeeder extends Seeder {

	public function run()
	{
		Eloquent::unguard();

		$tags = [
			[
			'title' => 'element',
			'slug' => 'element',
			'created_at' => Date::now(),
			'updated_at' => Date::now()],
			[
			'title' => 'gas',
			'slug' => 'gas',
			'created_at' => Date::now(),
			'updated_at' => Date::now()],

		];

		DB::table('tags')->insert($tags);

		$post_tag = [
			'post_id' => 1,
			'tag_id' => 1,
			'created_at' => Date::now(),
			'updated_at' => Date::now()];

		DB::table('post_tag')->insert($post_tag);
	}

}