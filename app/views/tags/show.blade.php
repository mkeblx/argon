@extends('layouts.default')

@section('title')
{{{ '#' . $tag->name }}}
@stop

@section('content')

<div class="tag-header">
<h1><b>#</b>{{ $tag->name }}</h1>
<h2>{{ ($tag->description)?$tag->description:'&nbsp;' }}</h2>
</div>
@if (!count($tag->posts))
No posts with this tag.
@endif
<br>

@foreach ($tag->posts as $post)
<div class="post type-{{'std'}} status-{{$post->status}}" id="{{$post->hash}}">

<div class="head">
	<h1><a href="{{ '/'.$post->slug.'/'.$post->hash }}">{{ $post->title }}</a></h1>
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
@endforeach

@stop