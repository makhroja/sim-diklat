<?php


class UserController extends BaseController
{

	public function login()
	{
		if (Auth::check() == TRUE) {
			return Redirect::to('dashboard');
		} else {
			return View::make('site.login');
		}
	}

	public function get_login()
	{
		if (Auth::attempt(array('username' => Input::get('username'), 'password' => Input::get('password')))) {
			return Redirect::to('dashboard')->with('success', 'Selamat datang Admin');
		} else {
			return Redirect::to('login')
				->with('error', 'Your username/password combination was incorrect')
				->withInput();
		}
	}

	public function get_logout()
	{
		Auth::logout();
		return Redirect::to('/login')->with('info', 'Your are now logged out!');
	}
}
