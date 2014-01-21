@extends('layouts.admin')

@section('title') posts @stop

@section('admin')
<a class="btn" href="/blocks/create/{{$block->slug}}">edit this block</a>
@stop

@section('content')
<div class="block" data-datetime="{{$block->created_at}}">

<div class="head">
	<h1>{{ $block->name }}</h1>
</div>

<div class="content">
{{ $block->content }}
</div>

</div>
@stop