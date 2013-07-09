$('#add_teacher').click(function() {
	var name = $('#inputName').val();
	var school  = $('#inputSchool').val();
	var desc = $('#inputRecord').val();
	$.post("ajax.php?do=teacher", { name: name ,school:school,desc:desc,op:'add'},
	  function(data){
	  }, "json");
});