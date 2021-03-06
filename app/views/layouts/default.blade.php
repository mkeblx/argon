<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>@yield('title')
 - {{ Config::get('app.title'); }}</title>
	<link rel="stylesheet" href="/css/style.css">
	@include('partials.highlight')
	<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:100,300,400,500,700">
	<link rel="alternate" type="application/atom+xml" href="{{ route('feed'); }}">
	<script src="/js/dist/libs.min.js"></script>
	<script data-main="/js/main" src="/js/libs/require.js"></script>
<head>
<body>
@section('admin-bar')
<? if (Auth::check()) : ?>
<div id="admin-bar" class="admin">
	<a class="btn" href="/" title="home">/</a> <a class="btn" href="{{ URL::to('dashboard', null, false) }}">dashboard</a>
	@yield('admin')
	<div class="right">
		<a class="btn" href="{{ route('logout') }}">logout</a>
	</div>
</div>
<? endif; ?>
@show
<div id="container">
		
@section('sidebar')
<div id="sidebar">
{{ Block::get('sidebar') }}
</div>
@show

<? if (Block::get('head')): ?>
@section('head')
<div class="head">
{{ Block::get('head') }}
</div>
@show
<? endif; ?>

<div id="primary">
@yield('content')
</div>

<div id="footer">
{{ Block::get('footer') }}
</div>
</div>
@include('partials.ga')
</body>
</html>