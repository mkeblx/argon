@extends('layouts.admin')

@section('title') blocks @stop

@section('admin')
<a class="btn" href="/blocks/create">add block</a>
@stop

@section('content')
<h1>blocks</h1>

@if (!count($blocks))
No blocks yet.
@endif
<ul class="blocks">
@foreach ($blocks as $b)
<li><a href="{{ route('blocks.display', $b->slug) }}">{{ $b->name }}</a></li>
@endforeach
</li>

@stop