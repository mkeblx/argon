<?php

class Post_Tag extends Eloquent {

	protected $table = 'post_tag';

	protected $fillable = ['name','slug','description'];

}