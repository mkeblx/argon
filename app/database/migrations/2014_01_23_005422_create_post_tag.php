<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostTag extends Migration {

	public function up()
	{
		Schema::create('post_tag', function(Blueprint $t)
		{
			$t->increments('id');
			$t->integer('post_id')->unsigned()->index();
			$t->integer('tag_id')->unsigned()->index();
			$t->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
			$t->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');			
			$t->timestamps();
			$t->unique(['post_id', 'tag_id']);
		});
	}

	public function down()
	{
		Schema::drop('post_tag');
	}

}
