<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTags extends Migration {

	public function up()
	{
		Schema::create('tags', function(Blueprint $t)
		{
			$t->increments('id');
			$t->string('name', 64);
			$t->string('slug', 64);
			$t->text('description');
			$t->timestamps();
			$t->unique('name');
		});
	}

	public function down()
	{
		Schema::drop('tags');
	}

}
