<?php

class AuthController extends BaseController {

	public function create() {

	}

	public function login() {
		return View::make('auth.login');
	}

	public function doLogin() {
		$credentials = Input::only('username', 'password');
		$remember = true;
		if (Auth::attempt($credentials, $remember)) {
			Event::fire('user.login');

			return Redirect::intended('/');
		}
		return Redirect::to('login');
	}

	public function logout() {
		Auth::logout();
		return Redirect::to('/');
	}

	public function dashboard() {
		$posts = Stat::getAllPosts();
		$blog  = Stat::getAllBlog();

		$stats = [
			'posts' => $posts,
			'blog' => $blog
			];

		return
			View::make('dashboard')
				->with('stats', $stats);
	}

}