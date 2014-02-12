<?php

class BlockController extends BaseController {

	public function index()
	{
		$blocks = Block::getAll();

		if (Request::ajax())
			return $blocks;

		return
			View::make('blocks.index')
				->with('blocks', $blocks);
	}

	public function create()
	{
		return
			View::make('blocks.create');
	}

	public function store()
	{
		$data = Input::except('_method','_token');

		if (Block::validate($data)->passes()) {
			$data['slug'] = Str::slug($data['name']);
			Block::create($data);
		} else {
			App::abort(403, 'Block data required');
		}

		return Redirect::to('blocks');
	}

	public function display($slug)
	{
		$block = Block::get($slug, false);

		Event::fire('block.display', [$block]);

		return
			View::make('blocks.show')
				->with('block', $block);		
	}

	public function get($name)
	{
		$block = Block::get($id);
		return $block;
	}

}