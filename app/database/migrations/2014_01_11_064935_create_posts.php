<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePosts extends Migration {

	public function up()
	{
		Schema::create('posts', function(Blueprint $t)
		{
			$t->increments('id');
			$t->string('title', 256);
			$t->string('slug', 256);
			$t->text('content');
			$t->string('status', 32);
			$t->dateTime('published_at');
			$t->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('posts');
	}

}