@extends('layouts.admin')

@section('title') create post @stop

@section('content')

<?
foreach ($errors->all() as $message) {
    echo '<div class="error-bar">'.$message.'</div>';
}

?>

{{ Form::open(['route' => 'posts.store', 'class' => 'post-form']) }}

{{ Form::text('title', null, ['placeholder' => 'title']) }}

<pre id="editor"></pre>

{{ Form::hidden('content', null, ['id' => 'model-content']) }}

{{ Form::text('tags', null, ['class' => 'tags', 'placeholder' => 'tags']) }}

{{ Form::text('published_at', Date::now(), ['class' => 'datetime']) }}

{{ Form::hidden('status', 'draft') }}

<span class="btn toggle-status-btn">{{ 'draft' }}</span>

{{ Form::submit('create') }}

{{ Form::close() }}

@include('partials/editor')

@stop