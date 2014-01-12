<?php

class BlockTableSeeder extends Seeder {

	public function run()
	{
		Eloquent::unguard();

		$blocks = [];

		DB::table('blocks')->insert($blocks);
	}

}