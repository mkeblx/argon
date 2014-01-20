<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStats extends Migration {

	public function up()
	{
		Schema::create('stats', function(Blueprint $t)
		{
			$t->increments('id');
			$t->string('type', 32)->default('posts');
			$t->integer('type_id');
			$t->string('metric')->default('view');
			$t->string('ip');
			$t->dateTime('created_at');
		});
	}

	public function down()
	{
		Schema::drop('stats');
	}

}