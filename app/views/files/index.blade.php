@extends('layouts.admin')

@section('title') files @stop

@section('admin')
	<a class="btn" href="{{ route('files.add') }}">add file</a>
@stop

@section('content')
<h2>files</h2>

@if (!count($files))
<p>No files uploaded.</p>
@endif
<ul class="files">
@foreach ($files as $f)
<?
	$name = basename($f);
	$url = '/uploads/'.$name;
?>
	<li><a href="{{ $url }}">{{ $name }}</a></li>
@endforeach
</ul>

@stop