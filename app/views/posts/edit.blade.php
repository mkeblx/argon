@extends('layouts.default')

@section('title') edit post @stop

@section('content')

{{ Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'put', 'class' => 'post-form']) }}

{{ Form::text('title') }}

<pre id="editor"></pre>

{{ Form::hidden('content', null, ['id' => 'post-content']) }}

{{ Form::text('published_at', null, ['class' => 'datetime']) }}

<span class="btn set-date-btn" data-datetime="{{Date::now()}}">set to now</span>

{{ Form::submit('save') }}

{{ Form::close() }}

@include('partials/editor')

@stop