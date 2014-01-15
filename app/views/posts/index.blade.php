@extends('layouts.default')

@section('title') posts @stop

@section('content')
<h1>posts</h1>

<?

$c = Config::get('hashids');
$hashids = new Hashids\Hashids($c['salt'], $c['min_hash_length'], $c['alphabet']);

?>

@if (!count($posts))
No posts yet.
@endif
<ul>
@foreach ($posts as $p)
<li><a href="{{ '/'.$p->slug.'/'.$hashids->encrypt($p->id) }}">{{ $p->title }}</a> <a href="{{ route('posts.edit', $p->id) }}">edit</a></li>
@endforeach
</li>

<a href="/posts/create">Add New</a>

@stop