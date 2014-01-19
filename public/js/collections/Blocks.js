define(function(require){

var Block = require('models/Block');

var Blocks = Backbone.Collection.extend({
	model: Block,
	url: '/blocks'
});

return Blocks;

});