define(function(require){

var PostView = Backbone.View.extend({

	tagName: 'div',
	className: 'post',

	render: function(){
		this.el.innerHTML = this.model.get('title');
	}

});

return PostView;

});