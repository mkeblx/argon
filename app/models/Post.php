<?php

class Post extends Eloquent {

	protected $table = 'posts';
	protected $softDelete = true;

	protected $fillable = ['title','slug','content','type','status','published_at'];

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
		return $this->attributes['content'];
	}

	public function scopePublished($query) {
		$now = Date::now();
		return $query->where('published_at', '<', $now)
								 ->where('status', 'final');
	}

	public function scopeDraft($query) {
		return $query->where('status', 'draft');
	}

}