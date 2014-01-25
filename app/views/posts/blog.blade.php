@extends('layouts.default')

@section('title')
{{ Config::get('app.title') }}
@stop

@section('admin')
	<a class="btn" href="{{ route('posts.index') }}">posts</a>
	<a class="btn" href="{{ route('blocks.index') }}">blocks</a>
@stop

@section('content')

@if (!count($posts))
No posts yet.
@else

@foreach ($posts as $post)
<? $hash = $post->hash; ?>
<div class="post type-{{'std'}} status-{{$post->status}}" id="post-{{$hash}}">

<div class="head">
	<h1><a href="{{ '/'.$post->slug.'/'.$hash }}">{{ $post->title }}</a></h1>
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