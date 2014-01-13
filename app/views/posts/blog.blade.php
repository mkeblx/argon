@extends('layouts.default')

@section('title')
	blog
@stop

@section('content')
<h1>blog</h1>

@if (!count($posts))
No posts yet.
@endif
<ul>
@foreach ($posts as $p)
<div class="post">
	<h2><a href="{{ '/'.$p->slug.'/'.$p->id }}">{{ $p->title }}</a></h2>
</div>
@endforeach
</li>

@stop