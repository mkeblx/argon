@extends('layouts.default')

@section('title')
	create post
@stop

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@stop

@section('content')
<h1>Posts</h1>

{{ Form::open(['route' => 'posts.store']) }}

{{ Form::text('title') }} <br>

{{ Form::textarea('content') }} <br>

{{ Form::submit('Save') }}

{{ Form::close() }}

@stop