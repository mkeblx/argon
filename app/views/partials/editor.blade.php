<script src="/js/libs/ace.js"></script>

<script>
$(function(){

	var editor = ace.edit('editor');
	editor.setShowPrintMargin(0);
	editor.setFontSize(15);
	editor.getSession().setTabSize(2);
	editor.getSession().setUseWrapMode(true);
	//editor.setTheme("ace/theme/twilight");
	//editor.getSession().setMode("ace/mode/javascript");

	var origVal = $('#model-content').val();
	editor.setValue(origVal);

	$('form').on('submit', function(e){
		var val = editor.getValue();
		$('#model-content').val(val);
	});

});
</script>