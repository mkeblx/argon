<?php

class Block extends Eloquent {

	protected $table = 'blocks';
	public $timestamps = false;

	protected $fillable = ['name','slug','description','content','type'];

	public static function boot() {
		parent::boot();

		static::saving(function($block){
			$block->slug = Str::slug($block->name);
			$block->created_at = Date::now();
		});
	}

	public static function validate($data) {
		$rules = [
			'name' => 'required',
			'content' => 'required'
			];

		$validator = Validator::make($data, $rules);

		return $validator;
	}

	public static function getAll($date = null) {
		$blocks = DB::select(DB::raw('SELECT b1.* FROM blocks b1
  			JOIN (SELECT slug, MAX(id) as id FROM blocks GROUP BY slug) b2
    		ON b1.slug = b2.slug AND b1.id = b2.id ORDER BY b1.id'));

		return $blocks; 
	}

	public static function get($slug, $contentOnly = true) {
		$block =
			DB::table('blocks')
				->where('slug', $slug)
				->orderBy('created_at', 'desc')
				->first();

		if ($block) {
			return ($contentOnly) ? $block->content : $block;
		}
		
		return '';
	}

}
