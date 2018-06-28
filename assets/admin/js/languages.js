var errorElementStart = "<div class='formError'><span>";
var errorElementEnd = "</span></div>";
$(document).ready(function(){
	$("#add_language_submit").on("click", function(e){
		//return true;
		e.preventDefault();
		$("#add_language_form .formError").remove();
		var currForm = $(this).closest("form");
		var errorCount = 0;

		var name = $.trim($("#name").val());
		
		if(name == ""){
			$(errorElementStart + "Please enter language name."+errorElementEnd).insertAfter($("#name"));
			errorCount++;
		}
				
		if(errorCount == 0){
			$("#add_language_form").submit();
		}
		else{
			return false;
		}
	});
	
	$("input[type='text'], select, textarea").on("click", function(){
		if($(this).next(".formError").length > 0){
			$(this).next(".formError").remove();
		}
	});
});
