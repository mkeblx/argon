<?php

namespace argon;
use Illuminate\Database\Eloquent\Model as Eloquent;


class File extends Eloquent {

	protected $table = 'files';

	protected $fillable = ['name','description','path','mime','size'];

	public function tags() {
		return $this->belongsToMany('Tag');
	}

	public static function validate($data) {
		$rules = [
			'name' => 'required',
			'path' => 'required',
			'mime' => 'required',
			'size' => 'required'
			];

		$validator = Validator::make($data, $rules);

		return $validator;
	}

}
