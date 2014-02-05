@extends('layouts.default')

@section('title')
{{{ $post->title }}}
@stop

@section('admin')
	<a class="btn" href="{{ route('posts.edit', $post->id) }}">edit this post</a>
@stop

@section('content')

<div id="post-{{$post->hash}}"
	class="post type-{{'std'}} status-{{$post->status}}"
	data-views="{{ count($post->stats) }}">

<div class="head">
	<h1>{{ $post->title }}</h1>
	<div class="date published" title="{{ $post->published_at }}">
		{{ $post->pubdate() }}
	</div>
	@if($post->subtitle)
	<h2>{{ $post->subtitle }}</h2>
	@endif
</div>

<div class="content">
{{ $post->content }}
</div>

@include('partials.tags')

</div>

<?
$prev = $neighbors['prev'];
$next = $neighbors['next'];
?>
@if($prev || $next)
<ul class="pagination">
	@if($prev) <li><a title="{{ $prev->title }}" href="/{{ $prev->slug.'/'.$prev->hash }}">&larr;prev</a></li> @endif
	@if($prev && $next)&middot;@endif
	@if($next) <li><a title="{{ $next->title }}" href="/{{ $next->slug.'/'.$next->hash }}">next&rarr;</a></li> @endif
</ul>
@endif

@stop