<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>@yield('title')</title>
	<link rel="stylesheet" href="/css/style.css">
	<script src="/dist/js/libs.min.js"></script>
	<script data-main="/js/main" src="/js/require.js"></script>
	<head>
	<body>
			@section('sidebar')
				This is the master sidebar.
			@show

			<div class="container">
				@yield('content')
			</div>
	@include('ga')
	</body>
</html>