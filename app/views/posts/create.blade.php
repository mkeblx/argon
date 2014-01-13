@extends('layouts.default')

@section('title')
	create post
@stop

@section('content')
<h1>Posts</h1>

<?
$now = \Carbon\Carbon::now();
?>

{{ Form::open(['route' => 'posts.store']) }}

{{ Form::text('title') }} <br>

{{ Form::textarea('content', null, ['id' => 'editor']) }}

{{ Form::text('published_at', $now) }}

{{ Form::submit('Save') }}

{{ Form::close() }}


<script src="/js/libs/ace.js"></script>

<script>
$(function(){
	var editor = ace.edit('editor');
});
</script>

@stop