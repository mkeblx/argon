@extends('layouts.admin')

@section('title') create block @stop

@section('content')

{{ Form::open(['route' => 'blocks.store', 'class' => 'block-form']) }}

{{ Form::text('name', $block->name, ['placeholder' => 'name', 'readonly']) }}

<pre id="editor"></pre>

{{ Form::hidden('content', $block->content, ['id' => 'model-content']) }}

{{ Form::submit('create') }}

{{ Form::close() }}

@include('partials/editor')

@stop