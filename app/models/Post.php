<?php

class Post extends Eloquent {

	protected $table = 'posts';

	protected $fillable = ['title','slug','content','type','status','publish_date'];

	protected $STATUS = [
		0 => 'draft',
		1 => 'published'
		];

	public function comments() {
		return $this->hasMany('Comment');
	}

	public function tags() {
		return $this->belongsToMany('Tag');
	}

	public static function validate($data) {
		$rules = [
			'title' => 'required',
			'content' => 'required'
			];

		$validator = Validator::make($data, $rules);

		return $validator;
	}

	public function findBySlug($slug) {
		return Post::where('slug',$slug)->first();
	}

	public function getParsedContentAttribute() {
		return 'parsed'; //$this->attributes['content']; //parse
	}

	public function scopePublished($query) {
		return $query->where('status', 1);
	}

	public function scopeDraft($query) {
		return $query->where('status', 0);
	}

}