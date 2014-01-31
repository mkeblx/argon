<?php

class FileController extends BaseController {

	public function index()
	{
		$files = File::files(public_path().'/uploads');

		return
			View::make('files.index')
				->with('files', $files);
	}

	public function add()
	{
		$upload_dir = '/uploads';

		if (!Input::hasFile('filename')) {
			return View::make('files.add');
		}

		$file = Input::file('filename');
		$name = $file->getClientOriginalName();

		$rename = Input::get('rename', '');

		if ($rename)
			$name = $rename;
		
		$data = [
			'name' => $name,
			'path' => $upload_dir.'/'.$name,
			'mime' => $file->getMimeType(),
			'size' => $file->getSize()
		];

		$dest = public_path().$upload_dir;
		$uploaded = $file->move($dest, $name);
		
		if ($uploaded) {
			$_file = \argon\File::create($data);
		}

		return Redirect::to('files');
	}

	public function get($name)
	{
		$file = File::get($id);
		return $file;
	}

}