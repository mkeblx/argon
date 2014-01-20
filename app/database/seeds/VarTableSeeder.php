<?php

class VarTableSeeder extends Seeder {

	public function run()
	{
		Eloquent::unguard();

		$vars = [
			[
			'name' => 'set-time',
			'description' => 'blocks set time',
			'value' => Date::now(),
			],
			[
			'name' => 'title',
			'description' => 'site title',
			'value' => 'argon',
			],
		];

		DB::table('vars')->insert($vars);
	}

}