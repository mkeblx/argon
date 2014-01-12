@extends('layouts.default')

@section('title')
	{{ $title }}
@stop

@section('content')
<h1>{{ $title }}</h1>

{{ $content }}

{{ $published_at }}

@stop