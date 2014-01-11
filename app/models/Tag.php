<?php

class Tag extends Eloquent {

	protected $post = 'tags';

	public function post() {
		return $this->belongsToMany('Post');
	}

	public function validate($data) {
		$rules = [
			'content' => 'required'
			];

		$validator = Validator::make($data, $rules);

		return $validator;
	}

}