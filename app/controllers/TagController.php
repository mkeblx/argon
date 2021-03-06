<?php

class TagController extends BaseController {

	public function index()
	{
		$tags = Tag::all();

		return
			View::make('tags.index')
				->with('tags', $tags);
	}

	public function show($slug)
	{
		$tag =
			Tag::with(array('posts' => function($q) {
					return $q->orderBy('published_at', 'DESC');
			}))
			->where('slug', $slug)
			->firstOrFail();

		Event::fire('tag.show', [$tag]);

		return
			View::make('tags.show')
				->with('tag', $tag);
	}

}