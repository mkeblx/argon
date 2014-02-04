<?php

class Post extends Eloquent {

	protected $table = 'posts';
	protected $softDelete = true;

	protected $fillable = ['title','slug','subtitle','content','type','status','published_at'];

	public function tags() {
		return $this->belongsToMany('Tag')->withTimestamps();
	}

	//views
	public function stats() {
		return
			$this->hasMany('Stat', 'type_id')
				->where('type', 'posts')
				->where('metric', 'view');
	}

	public function addTags($tags) {
		self::tags()->detach();

		$tags = explode(',', $tags);

		foreach ($tags as $name) {
			$name = trim($name);

			if ($name == '')
				continue;

			$tag = Tag::firstOrCreate(['name' => $name]);

			self::tags()->attach($tag);
		}

	}

	public static function boot() {
		parent::boot();

		static::creating(function($post){
			$c = Config::get('hashids');
			$hashids = new Hashids\Hashids($c['salt'], $c['min_hash_length'], $c['alphabet']);

			$post->hash = $hashids->encrypt(rand());
		});

		static::saving(function($post){
			$post->slug = Str::slug($post->title);
		});
	}

	public static function validate($data) {
		$rules = [
			'title' => 'required',
			'content' => 'required'
			];

		$validator = Validator::make($data, $rules);

		return $validator;
	}

	//relative date if within day
	public function pubdate($rel = true) {
		$now = Date::now();
		$published_at = $this->attributes['published_at'];
		$published_at = Date::parse($published_at);

		if ($now->diffInDays($published_at) <= 3) {
			$pubDate = $published_at->diffForHumans();
		} else {
			$pubDate = $published_at->format('j M Y');
		}

		return $pubDate;
	}

	public function getParsedContentAttribute() {
		return $this->attributes['content'];
	}

	public function scopeRecent($query, $num = 5) {
		$now = Date::now();
		return
			$query->where('published_at', '<', $now)
						->where('status', 'final')
						->orderBy('published_at', 'desc')
						->take($num);
	}

	public function scopePopular() {
		$now = Date::now();
		return $query; //todo: base on # views
	}

	public function scopeScheduled($query) {
		$now = Date::now();
		return $query->where('published_at', '>', $now)
								 ->where('status', 'final');
	}

	public function scopePublished($query) {
		$now = Date::now();
		return $query->where('published_at', '<', $now)
								 ->where('status', 'final');
	}

	public function scopeDraft($query) {
		return $query->where('status', 'draft');
	}

}