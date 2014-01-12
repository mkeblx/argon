<?php

class UserTableSeeder extends Seeder {

	public function run()
	{
		Eloquent::unguard();

		$users = [];

		DB::table('users')->insert($users);
	}

}