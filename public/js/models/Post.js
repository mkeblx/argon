define([], function(){

var Post = Backbone.Model.extend({

	statuses: ['draft','final'],

	defaults: {
		title: '',
		content: '',
		status: 'draft'
	},

	initialize: function()
	{

	},

	byStatus: function(status)
	{
		return this.filter(function(){
			return post.get('status') == status;
		});
	},

	url: function(){
		return '/posts'+(this.id?'/'+this.id:'');
	}

});

return Post;

});