<?php

class Post extends Eloquent {

	protected $table = 'posts';
	protected $softDelete = true;

	protected $fillable = ['title','slug','content','type','status','published_at'];

	protected $STATUS = [
		0 => 'draft',
		1 => 'published'
		];

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

	public function getParsedContentAttribute() {
		return 'parsed'; //$this->attributes['content']; //parse
	}

	public function scopePublished($query) {
		$now = \Carbon\Carbon::now();
		return $query->where('published_at', '<', $now);
	}

	public function scopeDraft($query) {
		return $query->where('status', 0);
	}

}