require([], function(){

function init() {

	//add datetime picker support
	$('input.datetime').on('click', function(ev){

	});


	$('pre code').each(function(i, e) {
		console.log('highlight section');
		hljs.highlightBlock(e);
	});

}

$(init);

});