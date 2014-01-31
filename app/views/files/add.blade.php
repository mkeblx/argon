@extends('layouts.admin')

@section('title') add file @stop

@section('content')
<h2>upload file</h2>

{{ Form::open(['route' => 'files.add', 'class' => 'upload-form', 'files' => true]) }}

{{ Form::file('filename') }} <br>

{{ Form::text('rename', null, ['placeholder' => 'rename']) }} <br>

{{ Form::submit('upload', ['class' => 'button']) }}

{{ Form::close() }}

@stop