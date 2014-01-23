@extends('layouts.default')

<?
$c = Config::get('hashids');
$hashids = new Hashids\Hashids($c['salt'], $c['min_hash_length'], $c['alphabet']);

?>

@section('title')
{{{ '#' . $tag->name }}}
@stop

@section('content')

<?

$posts = $tag->posts();

?>

<h1 class="lrg"><b>#</b>{{ $tag->name }}</h1>
@if (!count($tag->posts))
No posts with this tag.
@endif
<br>

@foreach ($tag->posts as $post)
<? $hash = $hashids->encrypt($post->id); ?>
<div class="post type-{{'std'}} status-{{$post->status}}" id="post-{{$hash}}">

<div class="head">
	<h1><a href="{{ '/'.$post->slug.'/'.$hash }}">{{ $post->title }}</a></h1>
	<div class="date published" title="{{ $post->published_at }}">
		{{ Date::parse($post->published_at)->format('j M Y') }}
	</div>
</div>

<div class="content">
{{ $post->content }}
</div>

</div>
@endforeach

@stop