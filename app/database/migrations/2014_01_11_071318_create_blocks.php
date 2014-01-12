<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlocks extends Migration {

	public function up()
	{
		Schema::create('blocks', function(Blueprint $t)
		{
			$t->increments('id');
			$t->string('name', 256);
			$t->string('slug', 256);
			$t->text('description');
			$t->text('content');
			$t->string('type', 32);
			$t->dateTime('created_at');
		});
	}


	public function down()
	{
		Schema::drop('blocks');
	}

}