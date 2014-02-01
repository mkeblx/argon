@extends('layouts.admin')

@section('title') posts @stop

@section('admin')
<a class="btn" href="/posts/create">add post</a>
@stop

@section('content')

<h2>drafts</h2>
@if (!count($drafts))
No drafts.
@endif
<ul class="posts">
@foreach ($drafts as $p)
	<li><a href="{{ '/'.$p->slug.'/'.$p->hash }}">{{ $p->title }}</a>
	<span class="date">
	</span>
	</li>
@endforeach
</ul>

<br>
<?
?>
@if(count($scheduled))
<h2>scheduled</h2>
<ul class="posts">
@foreach ($scheduled as $p)
	<li><a href="{{ '/'.$p->slug.'/'.$p->hash }}">{{ $p->title }}</a> &middot;
	<span class="date published" title="{{ $p->published_at }}">
		{{ $p->pubdate() }}
	</span>
	</li>
@endforeach
</ul>
@endif

<br>

<h2>published</h2>
@if (!count($posts))
No posts yet.
@endif
<ul class="posts">
@foreach ($posts as $p)
	<li><a href="{{ '/'.$p->slug.'/'.$p->hash }}">{{ $p->title }}</a> &middot;
	<span class="date published" title="{{ $p->published_at }}">
		{{ $p->pubdate() }}
	</span>
	</li>
@endforeach
</ul>

@stop