define(function(require){

var Post = require('models/Post');

var Posts = Backbone.Collection.extend({
	model: Post,
	url: '/posts'
});

return Posts;

});