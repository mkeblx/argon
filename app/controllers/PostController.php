<?php

class PostController extends BaseController {

	public function blog()
	{
		$posts =
			Post::published()
				->orderBy('published_at', 'desc')
				->get();

		return
			View::make('posts.blog')
				->with('posts', $posts);
	}

	public function index()
	{
		$posts =
			Post::orderBy('published_at', 'desc')
				->get();

		return
			View::make('posts.index')
				->with('posts', $posts);
	}

	public function create()
	{
		return
			View::make('posts.create');
	}

	public function store()
	{
		$data = Input::except('_method','_token');

		if (Post::validate($data)->passes()) {
			$data['slug'] = Str::slug($data['title']);
			Post::create($data);
		} else {
			exit('Post not filled out');
		}

		return Redirect::to('posts');
	}

	public function show($slug, $id)
	{
		$post = Post::findOrFail($id);

		return
			View::make('posts.show')
				->with('post', $post);
	}

	public function edit($id)
	{
		$post = Post::findOrFail($id);

		return
			View::make('posts.edit')
				->with('post', $post);
	}

	public function update($id)
	{
		$data = Input::except('_method','_token');
		
		$data['slug'] = Str::slug($data['title']);
		
		Post::where('id','=',$id)
			->update($data);

		return Redirect::to('posts');
	}

	public function destroy($id)
	{
		//
	}

}