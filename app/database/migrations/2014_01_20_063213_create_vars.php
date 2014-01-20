<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVars extends Migration {

	public function up()
	{
		Schema::create('vars', function(Blueprint $t)
		{
			$t->increments('id');
			$t->string('name', 256);
			$t->string('description', 256);
			$t->text('value');
		});
	}

	public function down()
	{
		Schema::drop('vars');
	}

}