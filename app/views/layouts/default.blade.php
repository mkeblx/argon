<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>@yield('title')</title>
<link rel="stylesheet" href="/css/style.css">
<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:100,300,400,500,700">
<script src="/js/dist/libs.min.js"></script>
<script data-main="/js/main" src="/js/libs/require.js"></script>
<head>
<body>
<? if (Auth::check()) : ?>
<div id="admin-bar" class="admin">
	<a class="btn right" href="{{ route('logout') }}">logout</a>
</div>
<? endif; ?>
<div id="container">
		
@section('sidebar')
<div id="sidebar">
</div>
@show

<div id="primary">
@yield('content')
</div>

<div id="foot">

</div>
</div>
@include('ga')
</body>
</html>