@extends('layouts.default')

@section('title')
{{{ $post->title }}}
@stop

@section('admin')
	<a class="btn" href="{{ route('posts.edit', $post->id) }}">edit this post</a>
@stop

@section('content')

<div id="post-{{$post->hash}}"
	class="post type-{{'std'}} status-{{$post->status}}"
	data-views="{{ count($post->stats) }}">

<div class="head">
	<h1>{{ $post->title }}</h1>
	<div class="date published" title="{{ $post->published_at }}">
		{{ $post->pubdate() }}
	</div>
	@if($post->subtitle)
	<h2>{{ $post->subtitle }}</h2>
	@endif
</div>

<div class="content">
{{ $post->content }}
</div>

@include('partials.tags')

</div>
@stop