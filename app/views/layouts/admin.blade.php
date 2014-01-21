<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>@yield('title')
 - {{ Config::get('app.title'); }}</title>
	<link rel="stylesheet" href="/css/style.css">
	@include('partials.highlight')
	<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:100,300,400,500,700">
	<script src="/js/dist/libs.min.js"></script>
	<script data-main="/js/main" src="/js/libs/require.js"></script>
<head>
<body>
@section('admin-bar')
<div id="admin-bar" class="admin">
	<a class="btn" href="/" title="home">/</a> <a class="btn" href="{{ URL::to('dashboard', null, false) }}">dashboard</a>
	@yield('admin')
	<div class="right">
		<a class="btn" href="{{ route('logout') }}">logout</a>
	</div>
</div>
@show

<div id="container">

<div id="primary">
@yield('content')
</div>

<div id="footer">
</div>
</div>
</body>
</html>