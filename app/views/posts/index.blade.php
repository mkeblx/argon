@extends('layouts.default')

@section('title')
	blog home
@stop

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@stop

@section('content')
<h1>Posts</h1>

@if (!count($posts))
No posts yet.
@endif
<ul>
@foreach ($posts as $P)
<li><a href="{{ route('posts.show', $P->id) }}">{{ $P->title }}</a></li>
@endforeach
</li>

<a href="/posts/create">Add New</a>

@stop