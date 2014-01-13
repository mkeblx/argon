@extends('layouts.default')

@section('title')
	posts
@stop

@section('content')
<h1>Posts</h1>

@if (!count($posts))
No posts yet.
@endif
<ul>
@foreach ($posts as $p)
<li><a href="{{ '/'.$p->slug.'/'.$p->id }}">{{ $p->title }}</a> <a href="{{ route('posts.edit', $p->id) }}">edit</a></li>
@endforeach
</li>

<a href="/posts/create">Add New</a>

@stop