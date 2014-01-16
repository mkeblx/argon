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

	public function get($id)
	{
		$block = Block::get($id);
		return $block;
	}

}