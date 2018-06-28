var errorElementStart = "<div class='formError'><span>";
var errorElementEnd = "</span></div>";
$(document).ready(function(){
	$("#add_call_center_submit").on("click", function(e){
		//return true;
		e.preventDefault();
		$("#add_call_center_form .formError").remove();
		var currForm = $(this).closest("form");
		var errorCount = 0;

		var name = $.trim($("#name").val());
		
		if(name == ""){
			$(errorElementStart + "Please enter call center name."+errorElementEnd).insertAfter($("#name"));
			errorCount++;
		}
				
		if(errorCount == 0){
			$("#add_call_center_form").submit();
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
