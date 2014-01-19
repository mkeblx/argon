<?php

namespace argon;

class File extends Eloquent {

	protected $table = 'files';

	protected $fillable = ['name','description','path','type'];

	public function tags() {
		return $this->belongsToMany('Tag');
	}

	public static function validate($data) {
		$rules = [
			'name' => 'required',
			'type' => 'required'
			];

		$validator = Validator::make($data, $rules);

		return $validator;
	}

}
