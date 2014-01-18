<?php

class BlockController extends BaseController {

	public function index()
	{
		$blocks = Block::all();

		if (Request::ajax())
			return $blocks;

		return
			View::make('blocks.index')
				->with('blocks', $blocks);
	}

	public function store()
	{
		$data = Input::except('_method','_token');

		if (Block::validate($data)->passes()) {
			$data['slug'] = Str::slug($data['name']);
			Block::create($data);
		} else {
			exit('Block data required');
		}

		return Redirect::to('posts');
	}

	public function display($slug)
	{
		$c = Config::get('hashids');
		$hashids = new Hashids\Hashids($c['salt'], $c['min_hash_length'], $c['alphabet']);

		$id = Str::lower($id);

		$de = $hashids->decrypt($id);
		if (is_array($de) && count($de))
			$id = $de[0];
		else
			App::abort(404);

		$block = Post::findOrFail($block);

		Event::fire('block.display', [$block]);

		return
			View::make('blocks.show')
				->with('block', $block);		
	}

	public function get($id)
	{
		$block = Block::get($id);
		return $block;
	}

}