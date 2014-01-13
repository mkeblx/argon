@extends('layouts.default')

@section('title') edit post @stop

@section('content')
<h1>Edit Post</h1>

{{ Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'put']) }}

{{ Form::text('title') }} <br>

{{ Form::textarea('content') }} <br>

{{ Form::text('published_at') }}

{{ Form::submit('Save') }}

{{ Form::close() }}

@stop