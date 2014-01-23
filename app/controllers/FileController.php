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
		return View::make('files.add');
	}

	public function upload()
	{

	}

	public function get($name)
	{
		$file = File::get($id);
		return $file;
	}

}