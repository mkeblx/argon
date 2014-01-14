@extends('layouts.default')

@section('title') create post @stop

@section('content')

{{ Form::open(['route' => 'posts.store', 'class' => 'post-form']) }}

{{ Form::text('title', null, ['placeholder' => 'title']) }}

<pre id="editor"></pre>

{{ Form::hidden('content', null, ['id' => 'post-content']) }}

{{ Form::text('published_at', Date::now(), ['class' => 'datetime']) }}

{{ Form::submit('Create') }}

{{ Form::close() }}

@include('partials/editor')

@stop