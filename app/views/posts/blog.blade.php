@extends('layouts.default')

@section('title')
{{ Config::get('app.title') }}
@stop

@section('admin')
	<a class="btn" href="{{ route('posts.index') }}">posts</a>
	<a class="btn" href="{{ route('blocks.index') }}">blocks</a>
	<a class="btn" href="{{ route('files') }}">files</a>	
@stop

@section('content')

@if (!count($posts))
No posts yet.
@else

@foreach ($posts as $post)
<div id="post-{{$post->hash}}"
	class="post type-{{'std'}} status-{{$post->status}}"
	data-views="{{ count($post->stats) }}">

<div class="head">
	<h1><a href="{{ '/'.$post->slug.'/'.$post->hash }}">{{ $post->title }}</a></h1>
	<div class="date published" title="{{ $post->published_at }}">
		{{ $post->pubdate() }}
	</div>
</div>

<div class="content">
{{ $post->content }}
</div>

@include('partials.tags')

</div>
@endforeach

<?= $posts->links() ?>

@endif

@stop