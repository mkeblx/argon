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

		$c = Config::get('hashids');
		$hashids = new Hashids\Hashids($c['salt'], $c['min_hash_length'], $c['alphabet']);

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
			$hash = $hashids->encrypt($post->id);
			$url = Config::get('app.url').'/'.$post->slug.'/'.$hash;
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

		$validator = Post::validate($data);
		if ($validator->passes()) {
			Post::create($data);
		} else {
			return Redirect::to('posts/create')
				->withInput(Input::get())
				->withErrors($validator);
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
		
		$data['slug'] = Str::slug($data['title']);
		$post = Post::where('id','=',$id);
		$post->update($data);

		return Redirect::to('posts');
	}

	public function destroy($id)
	{
		//
	}

}