<?php

class PostController extends BaseController {

	public function blog()
	{
		$POSTS_PER_PAGE = 16;

		$posts =
			Post::published()
				->orderBy('published_at', 'desc')
				->paginate($POSTS_PER_PAGE);

		if (Request::ajax())
			return $posts;

		Event::fire('post.blog');

		return
			View::make('posts.blog')
				->with('posts', $posts);
	}

	public function feed($tag)
	{
		$NUM_POSTS = 16;

		$posts =
			Post::published()
				->orderBy('published_at', 'desc')
				->take($NUM_POSTS)
				->get();

		//feed gen
		foreach ($posts as $post) {
			
		}

		return $posts;
	}

	//REST

	public function index()
	{
		$posts =
			Post::published()
				->orderBy('published_at', 'desc')
				->get();

		$drafts =
			Post::draft()
				->orderBy('updated_at', 'desc')
				->get();

		if (Request::ajax())
			return $posts;

		return
			View::make('posts.index')
				->with('posts', $posts)
				->with('drafts', $drafts);
	}

	public function create()
	{
		return View::make('posts.create');
	}

	public function store()
	{
		$data = Input::except('_method','_token');

		if (Post::validate($data)->passes()) {
			//$data['slug'] = Str::slug($data['title']);
			Post::create($data);
		} else {
			exit('Post not filled out');
		}

		return Redirect::to('posts');
	}

	public function display($slug, $id)
	{
		$c = Config::get('hashids');
		$hashids = new Hashids\Hashids($c['salt'], $c['min_hash_length'], $c['alphabet']);

		$id = Str::lower($id);

		$de = $hashids->decrypt($id);
		if (is_array($de) && count($de))
			$id = $de[0];
		else
			App::abort(404);

		$post = Post::findOrFail($id);

		Event::fire('post.display', [$post]);

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
		
		//$data['slug'] = Str::slug($data['title']);
		
		Post::where('id','=',$id)
			->update($data);

		return Redirect::to('posts');
	}

	public function destroy($id)
	{
		//
	}

}