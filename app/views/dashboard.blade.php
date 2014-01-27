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

<svg id="chart"></svg>

<script>
$(drawStats);

var data = <?=json_encode($stats['blog'])?>;
//data.reverse();

var ns = _.pluck(data, 'n');

var width = 200;
var barHeight = 20;
var days = 30;

var x = d3.scale.linear()
	.domain([0, d3.max(ns)])
	.range([0, width]);

var iformat = d3.time.format("%Y-%m-%d");
var oformat = d3.time.format("%b %-d");

function drawStats(){
	var chart = d3.select("#chart")
  	.attr("height", barHeight * days)
		.attr("width", width+60);

	var bar = chart.selectAll("g")
		.data(data)
	.enter().append("g")
		.attr("transform", function(d, i){ return "translate(60,"+i*barHeight+")" });

	bar.append("rect")
		.attr("width", function(d) { return x(d.n); })
		.attr("height", barHeight - 2);

	bar.append("text")
		.attr("x", function(d) { return x(d.n) - 3; })
		.attr("y", (barHeight-2) / 2)
		.attr("dy", ".35em")
		.text(function(d) { return (d.n) ? d.n : null; });

	bar.append("text")
		.attr("x", function(d) { return - 10; })
		.attr("y", barHeight / 2)
		.attr("dy", ".35em")
		.text(function(d){ return oformat(iformat.parse(d.date)); });

}
</script>

@stop