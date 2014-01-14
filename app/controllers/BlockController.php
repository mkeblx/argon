<?php

class BlockController extends BaseController {

	public function index()
	{
		$blocks = Block::all();

		return
			View::make('blocks.index')
				->with('blocks', $blocks);
	}

	public function create()
	{
		//
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

	public function show($id)
	{
		//
	}

	public function edit($id)
	{
		//
	}

	public function update($id)
	{
		//
	}

	public function destroy($id)
	{
		//
	}

}