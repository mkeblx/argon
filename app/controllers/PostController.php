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

	public function feed()
	{
		$NUM_POSTS = 16;

		$posts =
			Post::published()
				->orderBy('published_at', 'desc')
				->take($NUM_POSTS)
				->get();

		$feed = Feed::make();

		$feed->title = Config::get('app.title');
		$feed->description = Config::get('app.description');
		//$feed->logo = 'http://yoursite.tld/logo.jpg';
		$feed->link = URL::to('feed');
		$feed->pubdate = $posts[0]->created_at;
		$feed->lang = 'en';
		
		foreach ($posts as $post) {
			$url = Config::get('app.url').'/'.$post->slug.'/'.$post->hash;
			$feed->add($post->title, '', $url, $post->published_at, $post->content);
		}

		return $feed->render('atom');
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

		$scheduled =
			Post::scheduled()
				->orderBy('published_at', 'desc')
				->get();

		if (Request::ajax())
			return $posts;

		return
			View::make('posts.index')
				->with('posts', $posts)
				->with('drafts', $drafts)
				->with('scheduled', $scheduled);
	}

	public function create()
	{
		return View::make('posts.create');
	}

	public function store()
	{
		$data = Input::except('_method','_token', 'tags');

		$validator = Post::validate($data);
		if ($validator->passes()) {
			$post = Post::create($data);
			$post->addTags(Input::get('tags'));
		} else {
			return Redirect::to('posts/create')
				->withInput($data)
				->withErrors($validator);
		}

		return Redirect::to('posts');
	}

	public function display($slug, $hash)
	{
		$hash = Str::lower($hash);

		$post = Post::where('hash', $hash)->firstOrFail();

		Event::fire('post.display', [$post]);

		return
			View::make('posts.show')
				->with('post', $post);
	}

	public function edit($id)
	{
		$post = Post::findOrFail($id);

		$tags = array_pluck($post->tags->toArray(), 'name');

		return
			View::make('posts.edit')
				->with('post', $post)
				->with('tags', $tags);
	}

	public function update($id)
	{
		$data = Input::except('_method','_token', 'tags');
		
		$data['slug'] = Str::slug($data['title']);
		$post = Post::find($id);
		
		if (!$post)
			App::abort(404, 'Post not found');

		$post->addTags(Input::get('tags'));
		$post->update($data);

		return Redirect::to('posts');
	}

	public function destroy($id)
	{
		//
	}

}