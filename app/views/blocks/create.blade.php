@extends('layouts.default')

@section('title') create block @stop

@section('content')

{{ Form::open(['route' => 'blocks.store', 'class' => 'block-form']) }}

{{ Form::text('title', null, ['placeholder' => 'title']) }}

<pre id="editor"></pre>

{{ Form::hidden('content', null, ['id' => 'post-content']) }}

{{ Form::submit('create') }}

{{ Form::close() }}

@include('partials/editor')

@stop