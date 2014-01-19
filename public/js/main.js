define(function(require){

function init() {

	var Posts  = require('collections/Posts');
	var Router = require('Router');

	var router = new Router;

	Backbone.history.start();


	//todo: add datetime picker support
	$('input.datetime').on('click', function(ev){

	});

	$('.set-date-btn').on('click', function(ev){
		var $this = $(this);

		var val = $this.data('datetime');

		$this.parent().find('input[name=published_at]').val(val);
	});

	$('pre code').each(function(i, e) {
		console.log('highlight section');
		hljs.highlightBlock(e);
	});

}

$(init);

});