<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFiles extends Migration {

	public function up()
	{
		Schema::create('files', function(Blueprint $t)
		{
			$t->increments('id');
			$t->string('name', 256);
			$t->text('description');
			$t->string('path', 256);
			$t->string('mime', 64);
			$t->string('size', 32);
			$t->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('files');
	}

}
