@extends('layouts.default')

@section('title')
	{{ $post['title'] }}
@stop


@section('content')
<div class="post">
<div class="head">
<h1>{{ $post['title'] }}</h1>
<div class="date published" title="{{ $post['published_at'] }}">
{{ \Carbon\Carbon::parse($post['published_at'])->format('j M Y') }}
</div>
</div>

{{ $post['content'] }}

</div>
@stop