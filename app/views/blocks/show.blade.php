@extends('layouts.default')

@section('title') posts @stop

@section('admin')
<a class="btn" href="/blocks/create">edit block</a>
@stop

@section('content')
<div class="post">

<div class="head">
	<h1>{{ $block->name }}</h1>
</div>

<div class="content">
{{ $block->content }}
</div>

</div>
@stop