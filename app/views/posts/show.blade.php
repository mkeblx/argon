@extends('layouts.default')

@section('title')
{{{ $post->title }}}
@stop

@section('content')
<div class="post">

<? if (Auth::check()) : ?>
<div class="admin">
	<a class="btn" href="{{ route('posts.edit', $post->id) }}">edit</a>
</div>
<? endif; ?>

<div class="head">
	<h1>{{ $post->title }}</h1>
	<div class="date published" title="{{ $post->published_at }}">
		{{ Date::parse($post['published_at'])->format('j M Y') }}
	</div>
</div>

<div class="content">
{{ $post->content }}
</div>

</div>
@stop