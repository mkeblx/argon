@extends('layouts.admin')

@section('title') edit post @stop

@section('content')

{{ Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'put', 'class' => 'post-form']) }}

{{ Form::text('title') }}

{{ Form::text('subtitle', null, ['placeholder' => 'subtitle']) }}

<pre id="editor"></pre>

{{ Form::hidden('content', null, ['id' => 'model-content']) }}

{{ Form::text('tags', implode(',', $tags), ['class' => 'tags', 'placeholder' => 'tags']) }}

{{ Form::text('published_at', null, ['class' => 'datetime']) }}

{{ Form::hidden('status') }}

<span class="btn set-date-btn" data-datetime="{{Date::now()}}">set to now</span>
<span class="btn toggle-status-btn">{{ $post->status }}</span>

{{ Form::submit('save') }}

{{ Form::close() }}

@include('partials/editor')

@stop