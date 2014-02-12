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

	public static function getAllPosts() {
		$_stats = DB::table('stats')
				->select(DB::raw('date(created_at) as date'), DB::raw('count(id) as n'))
				->where('metric','view')
				->where('type', 'posts')
				->where('created_at', '>', Date::now()->subMonth())
				->groupBy(DB::raw('date(created_at)'))
				->orderBy('created_at')
				->get();

		//ugly
		$today = Date::today();		
		$numDays = 30;

		$stats = [];

		$day = $today;
		foreach (range(0, $numDays) as $i) {
			$dStr = $day->toDateString();
			$stats[$dStr] = ['n' => 0, 'date' => $dStr];
			$day = $day->subDay();
		}
		foreach ($_stats as $stat) {
			$stats[$stat->date]['n'] = (int)$stat->n;
		}

		return array_values($stats);
	}
	
	public static function getAllBlog() {
		$_stats = DB::table('stats')
				->select(DB::raw('date(created_at) as date'), DB::raw('count(id) as n'))
				->where('metric','view')
				->where('type', 'blog')
				->where('created_at', '>', Date::now()->subMonth())
				->groupBy(DB::raw('date(created_at)'))
				->orderBy('created_at')
				->get();

		//ugly
		$today = Date::today();		
		$numDays = 30;

		$stats = [];

		$day = $today;
		foreach (range(0, $numDays) as $i) {
			$dStr = $day->toDateString();
			$stats[$dStr] = ['n' => 0, 'date' => $dStr];
			$day = $day->subDay();
		}
		foreach ($_stats as $stat) {
			$stats[$stat->date]['n'] = (int)$stat->n;
		}

		return array_values($stats);
	}	

	public function post() {
		return $this->belongsTo('Post');
	}

	public function block() {
		return $this->belongsTo('Block');
	}

	public function validate($data) {
		$rules = [
			'metric' => 'required'
			];

		$validator = Validator::make($data, $rules);

		return $validator;
	}

}