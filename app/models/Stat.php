<?php

class Stat extends Eloquent {

	protected $table = 'stats';
	public $timestamps = false;

	protected $fillable = ['type','type_id','metric','ip','created_at'];

	public static function boot() {
		parent::boot();

		static::creating(function($post){
			if (Auth::check()) //ignore if self
				return false;
		});
	}

	public static function getAll($metric = 'view', $type = 'posts') {
		return self::where('metric','=', $metric)
				->where('type', $type)
				->get();
	}

	public static function getAllBlog() {
		return DB::table('stats')
				->select('id', DB::raw('date(created_at) as date'), DB::raw('count(id) as n'))
				->where('metric','view')
				->where('type', 'blog')
				->groupBy(DB::raw('date(created_at)'))
				->orderBy('created_at')
				->get();
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