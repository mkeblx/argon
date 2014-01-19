<?php

class UserTableSeeder extends Seeder {

	public function run()
	{
		Eloquent::unguard();

		$user = [
			'id' => 1,
			'username' => 'argon',
			'password' => Hash::make('password'),
			'role' => 'admin',
			'created_at' => new DateTime,
			'updated_at' => new DateTime
		];

		User::create($user);
	}

}