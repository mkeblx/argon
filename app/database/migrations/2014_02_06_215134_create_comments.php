<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComments extends Migration {

	public function up()
	{
		Schema::create('comments', function(Blueprint $t)
		{
			$t->increments('id');
			$t->string('name', 64);
			$t->string('email', 128);
			$t->string('website', 128);
			$t->text('content');
			$t->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('comments');
	}

}
