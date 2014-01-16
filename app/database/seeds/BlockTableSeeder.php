<?php

class BlockTableSeeder extends Seeder {

	public function run()
	{
		Eloquent::unguard();

		return;
		$blocks = [];

		DB::table('blocks')->insert($blocks);
	}

}