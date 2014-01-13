<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="initial-scale=1">
<title>@yield('title')</title>
<link rel="stylesheet" href="/css/style.css">
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700">
<script src="/dist/js/libs.min.js"></script>
<script data-main="/js/main" src="/js/libs/require.js"></script>
<head>
<body>
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