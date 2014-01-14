@extends('layouts.default')

@section('title') login @stop

@section('content')
<h1>login</h1>

{{ Form::open(['route' => 'doLogin', 'class' => 'login-form']) }}

{{ Form::text('username') }}

{{ Form::password('password') }}

{{ Form::submit('Login') }}

{{ Form::close() }}

@stop