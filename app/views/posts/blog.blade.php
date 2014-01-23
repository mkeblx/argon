@extends('layouts.default')

@section('title') blog @stop

@section('admin')
	<a class="btn" href="{{ route('posts.index') }}">posts</a>
	<a class="btn" href="{{ route('blocks.index') }}">blocks</a>
@stop

@section('content')

<?
$c = Config::get('hashids');
$hashids = new Hashids\Hashids($c['salt'], $c['min_hash_length'], $c['alphabet']);
?>

@if (!count($posts))
No posts yet.
@else

@foreach ($posts as $post)
<? $hash = $hashids->encrypt($post->id); ?>
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

<div class="tags">
@foreach($post->tags as $tag)
	<span><a href="{{ route('tags.show', $tag->slug) }}">{{ '<b>#</b>'.$tag->name }}</a></span>
@endforeach
</div>

</div>
@endforeach

<?php echo $posts->links(); ?>

@endif

@stop