@extends('layouts.default')

@section('title') blog @stop

@section('content')

<?

$c = Config::get('hashids');
$hashids = new Hashids\Hashids($c['salt'], $c['min_hash_length'], $c['alphabet']);

?>

@if (!count($posts))
No posts yet.
@elseif (1)

<ul>
@foreach ($posts as $post)
<div class="post">

<div class="head">
	<h1><a href="{{ '/'.$post->slug.'/'.$hashids->encrypt($post->id) }}">{{ $post->title }}</a></h1>
	<div class="date published" title="{{ $post->published_at }}">
		{{ Date::parse($post->published_at)->format('j M Y') }}
	</div>
</div>

<div class="content">
{{ $post->content }}
</div>

</div>
@endforeach
</li>

@else

@endif

@stop