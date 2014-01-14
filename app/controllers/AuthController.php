<?php

class AuthController extends BaseController {

	public function create() {

	}

	public function login() {
		return View::make('auth.login');
	}

	public function doLogin() {
		$credentials = Input::only('username', 'password');
		if (Auth::attempt($credentials, true)) {
			return Redirect::intended('/');
		}
		return Redirect::to('login');
	}

	public function logout() {
		Auth::logout();
	}

}