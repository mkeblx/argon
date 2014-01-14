@extends('layouts.default')

@section('title') edit post @stop

@section('content')

{{ Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'put']) }}

{{ Form::text('title') }}

<pre id="editor"></pre>

{{ Form::hidden('content', null, ['id' => 'post-content']) }}

{{ Form::text('published_at', null, ['class' => 'datetime']) }}

{{ Form::submit('Save') }}

{{ Form::close() }}

@include('partials/editor')

@stop