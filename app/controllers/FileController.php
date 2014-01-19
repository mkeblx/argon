<?php

class FileController extends BaseController {

	public function index()
	{
		$files = argon\File::all();

		return
			View::make('files.index')
				->with('files', $files);
	}

	public function upload()
	{
		//handle upload
		Input::hasFile('filename');

		return Redirect::to('/');
	}

	public function get($name)
	{
		$file = File::get($id);
		return $file;
	}

}