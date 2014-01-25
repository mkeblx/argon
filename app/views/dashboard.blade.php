@extends('layouts.admin')

@section('title')
dashboard
@stop

@section('admin')
	<a class="btn" href="{{ route('posts.index') }}">posts</a>
	<a class="btn" href="{{ route('blocks.index') }}">blocks</a>
	<a class="btn" href="{{ route('files') }}">files</a>
@stop

@section('content')
<h2>stats</h2>

<div id="stats">
<h3>post views (<?= count($stats['posts']) ?>)</h3>

<br><br>
<?
$day_views = array_pluck($stats['blog'], 'n');
?>
<h3>blog views (<?= array_sum($day_views) ?>)</h3>

</div>

<div id="chart">
</div>

<script>
$(drawStats);

var data = <?=json_encode($stats['blog'])?>;
data.reverse();

//todo: fill in missing dates, svg-ive

var ns = _.pluck(data, 'n');

var x = d3.scale.linear()
	.domain([0, d3.max(ns)])
	.range([0, 200]);

function drawStats(){
	d3.select("#chart")
	.selectAll("div")
		.data(data)
	.enter().append("div")
		.style("width", function(d) { return x(d.n) + "px"; })
		.attr("title", function(d){ return d.date; })
		.text(function(d) { return (d.n == 0) ? '' : d.n; });
}
</script>

@stop