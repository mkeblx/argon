<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>@yield('title')</title>
<link rel="stylesheet" href="/css/style.css">
@include('partials.highlight')
<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:100,300,400,500,700">
<script src="/js/dist/libs.min.js"></script>
<script data-main="/js/main" src="/js/libs/require.js"></script>
<head>
<body>
@section('admin-bar')
<? if (Auth::check()) : ?>
<div id="admin-bar" class="admin">
	<a class="btn" href="/">argon</a>
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
</div>
@show

<div id="primary">
@yield('content')
</div>

<div id="foot">
@yield('foot')
</div>
</div>
@include('ga')
</body>
</html>