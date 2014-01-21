@extends('layouts.admin')

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
	<li></li>
@endforeach
</ul>

@stop