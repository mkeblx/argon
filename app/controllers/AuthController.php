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
			return Redirect::intended('/');
		}
		return Redirect::to('login');
	}

	public function logout() {
		Auth::logout();
		return Redirect::to('/');
	}

}