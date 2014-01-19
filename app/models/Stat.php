<?php

class Stat extends Eloquent {

	protected $table = 'stats';

	public function post() {
		return $this->belongsToMany('Post');
	}

	public function validate($data) {
		$rules = [
			'metric' => 'required'
			];

		$validator = Validator::make($data, $rules);

		return $validator;
	}

}