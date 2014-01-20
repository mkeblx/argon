define(function(require){

function init() {

	var Posts  = require('collections/Posts');
	var Router = require('Router');

	var router = new Router;

	Backbone.history.start();

	$('input.datetime').on('click', function(ev){

	});

	$('.error-bar').slideDown(500);

	$('.toggle-status-btn').on('click', function(){
		var $this = $(this);

		var status = ($this.html() == 'draft') ? 'final' : 'draft';
		$this.html(status);
		$this.parent().find('input[name=status]').val(status);
	});

	$('.set-date-btn').on('click', function(ev){
		var $this = $(this);
		var val = $this.data('datetime');
		$this.parent().find('input[name=published_at]').val(val);
	});

	$('pre code').each(function(i, e) {
		hljs.highlightBlock(e);
	});

}

$(init);

});