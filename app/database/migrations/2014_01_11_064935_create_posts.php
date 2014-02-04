<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePosts extends Migration {

	public function up()
	{
		Schema::create('posts', function(Blueprint $t)
		{
			$t->increments('id');
			$t->string('hash', 32);
			$t->string('title', 256);
			$t->string('slug', 256);
			$t->text('subtitle');
			$t->text('content');
			$t->string('status', 32)->default('draft');
			$t->dateTime('published_at');
			$t->softDeletes();
			$t->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('posts');
	}

}
