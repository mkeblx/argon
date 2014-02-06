<?php

class CommentController extends BaseController {

	public function store()
	{
		$data = Input::except('_method','_token');

		$validator = Comment::validate($data);
		if ($validator->passes()) {
			$comment = Comment::create($data);
		}

		return $comment;
	}

}