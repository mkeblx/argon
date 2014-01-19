<?php

class Tag extends Eloquent {

	protected $table = 'tags';

	public function posts() {
		return $this->belongsToMany('Post');
	}

	public function validate($data) {
		$rules = [
			'name' => 'required'
			];

		$validator = Validator::make($data, $rules);

		return $validator;
	}

}