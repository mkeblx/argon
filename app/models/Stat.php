<?php

class Stat extends Eloquent {

	protected $table = 'stats';
	public $timestamps = false;

	protected $fillable = ['type','type_id','metric','ip','created_at'];

	public static function boot() {
		parent::boot();

		static::creating(function($post){
			if (Auth::check())
				return false;
		});
	}

	public function post() {
		return $this->belongsToMany('Post');
	}

	public function block() {
		return $this->belongsToMany('Block');
	}

	public function validate($data) {
		$rules = [
			'metric' => 'required'
			];

		$validator = Validator::make($data, $rules);

		return $validator;
	}

}