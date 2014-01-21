<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsers extends Migration {

	public function up()
	{
		Schema::create('users', function(Blueprint $t)
		{
			$t->increments('id');
			$t->string('username', 32);
			$t->string('password', 64);
			$t->string('role', 32);
			$t->timestamps();
			$t->dateTime('last_login');
		});
	}

	public function down()
	{
		Schema::drop('users');
	}

}