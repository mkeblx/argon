@extends('layouts.default')

@section('title') posts @stop

@section('admin')
<a class="btn" href="/posts/create">add post</a>
@stop

@section('content')
<h1>posts</h1>

<?

$c = Config::get('hashids');
$hashids = new Hashids\Hashids($c['salt'], $c['min_hash_length'], $c['alphabet']);

?>

<h2>drafts</h2>
@if (!count($drafts))
No drafts.
@endif
<ul class="posts">
@foreach ($drafts as $p)
	<li><a href="{{ '/'.$p->slug.'/'.$hashids->encrypt($p->id) }}">{{ $p->title }}</a> &middot;
	<span class="date published" title="{{ $p->published_at }}">
		{{ Date::parse($p->updated_at)->format('j M Y') }}
	</span>
	</li>
@endforeach
</ul>

<br>

<h2>published</h2>
@if (!count($posts))
No posts yet.
@endif
<ul class="posts">
@foreach ($posts as $p)
	<li><a href="{{ '/'.$p->slug.'/'.$hashids->encrypt($p->id) }}">{{ $p->title }}</a> &middot;
	<span class="date published" title="{{ $p->published_at }}">
		{{ Date::parse($p->published_at)->format('j M Y') }}
	</span>
	</li>
@endforeach
</ul>

@stop