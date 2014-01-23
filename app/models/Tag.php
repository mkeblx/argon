<?php

class Tag extends Eloquent {

	protected $table = 'tags';

	protected $fillable = ['name','slug','description','created_at'];

	public function posts() {
		return $this->belongsToMany('Post');
	}

	public static function boot() {
		parent::boot();

		static::saving(function($tag){
			$tag->slug = Str::slug($tag->name);
		});
	}

	public static function validate($data) {
		$rules = [
			'name' => 'required'
			];

		$validator = Validator::make($data, $rules);

		return $validator;
	}

}