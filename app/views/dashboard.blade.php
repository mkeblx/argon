@extends('layouts.admin')

@section('title')
dashboard
@stop

@section('admin')
	<a class="btn" href="{{ route('posts.index') }}">posts</a>
	<a class="btn" href="{{ route('blocks.index') }}">blocks</a>
	<a class="btn" href="{{ route('files') }}">files</a>
@stop

@section('content')
<h2>stats</h2>
<p>coming soon</p>

<div id="stats"></div>

<script>
$(drawStats);

function drawStats(){
	
}
</script>

@stop