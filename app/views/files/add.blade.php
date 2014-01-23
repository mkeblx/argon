@extends('layouts.admin')

@section('title') add file @stop

@section('content')
<h2>upload file</h2>

{{ Form::open(['route' => 'files.add', 'class' => 'upload-form']) }}

{{ Form::file('filename') }}

<br>

{{ Form::submit('upload', ['class' => 'button']) }}

{{ Form::close() }}

@stop