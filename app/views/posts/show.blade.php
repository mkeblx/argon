@extends('layouts.default')

@section('title')
{{{ $post->title }}}
@stop

@section('admin')
	<a class="btn" href="{{ route('posts.edit', $post->id) }}">edit this post</a>
@stop

@section('content')
<div class="post type-{{'std'}} status-{{$post->status}}" id="post-{{$id}}">

<div class="head">
	<h1>{{ $post->title }}</h1>
	<div class="date published" title="{{ $post->published_at }}">
		{{ $post->pubdate() }}
	</div>
</div>

<div class="content">
{{ $post->content }}
</div>

<div class="tags">
@foreach($post->tags as $tag)
	<span><a href="{{ route('tags.show', $tag->slug) }}">{{ '#'.$tag->name }}</a></span>
@endforeach
</div>

</div>
@stop