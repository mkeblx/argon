<script src="/js/libs/ace.js"></script>

<script>
$(function(){
	var editor = ace.edit('editor');
	editor.setShowPrintMargin(0);
	editor.getSession().setTabSize(2);
	editor.getSession().setUseWrapMode(true);
	//editor.setTheme("ace/theme/twilight");
	//editor.getSession().setMode("ace/mode/javascript");

	var origVal = $('#post-content').val();
	editor.setValue(origVal);

	$('.post-form').on('submit', function(e){
		var val = editor.getValue();
		$('#post-content').val(val);
	});

});
</script>