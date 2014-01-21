@extends('layouts.default')

@section('title') login @stop

@section('content')

{{ Form::open(['route' => 'login.do', 'class' => 'login-form']) }}

{{ Form::text('username', null, ['placeholder' => 'username']) }}

{{ Form::password('password', ['placeholder' => 'password']) }} <br>

{{ Form::submit('login', ['class' => 'button']) }}

{{ Form::close() }}

@stop