<?php

class FileController extends BaseController {

	public function index()
	{
		$files = argon\File::all();

		return
			View::make('files.index')
				->with('files', $files);
	}

	public function add()
	{
		if (!Input::hasFile('filename')) {
			return View::make('files.add');
		}

		$file = Input::file('filename');
		$name = $file->getClientOriginalName();

		$file->move(public_path().'/uploads', $name);
		
		return Redirect::to('files');

		$data = [];
		\argon\File::create($data);
	}

	public function get($name)
	{
		$file = File::get($id);
		return $file;
	}

}