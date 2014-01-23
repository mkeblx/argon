@extends('layouts.admin')

@section('title') tags @stop


@section('content')

<h2>tags</h2>
@if (!count($tags))
No tags yet.
@endif
<ul class="tags">
@foreach ($tags as $t)
	<li><a href="{{ '/tags/'.$t->slug }}">{{ $t->name }}</a></li>
@endforeach
</ul>

@stop