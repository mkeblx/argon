<?php

class UserTableSeeder extends Seeder {

	public function run()
	{
		Eloquent::unguard();

		User::create([
			'id' => 1,
			'username' => 'argon',
			'password' => Hash::make('password'),
			'created_at' => new DateTime,
			'updated_at' => new DateTime
		]);
	}

}