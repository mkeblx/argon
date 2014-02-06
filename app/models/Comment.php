<?php

class Comment extends Eloquent {

	protected $table = 'comments';

	protected $fillable = ['name','email','website','content'];

	public function post() {
		return $this->belongsTo('Post');
	}

	public static function boot() {
		parent::boot();

		static::saving(function($tag){
			//clean up content, make safe for html context
		});
	}

	public static function validate($data) {
		$rules = [
			'name' => 'required',
			'email' => 'required|email',
			'content' => 'required'
			];

		$validator = Validator::make($data, $rules);

		return $validator;
	}

}