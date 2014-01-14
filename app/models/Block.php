<?php

class Block extends Eloquent {

	protected $table = 'blocks';

	protected $fillable = ['name','slug','description','content','type'];

	public static function validate($data) {
		$rules = [
			'name' => 'required',
			'content' => 'required'
			];

		$validator = Validator::make($data, $rules);

		return $validator;
	}

}
