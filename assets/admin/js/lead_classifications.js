var errorElementStart = "<div class='formError'><span>";
var errorElementEnd = "</span></div>";
$(document).ready(function(){
	$("#add_lead_classification_submit").on("click", function(e){
		//return true;
		e.preventDefault();
		$("#add_lead_classification_form .formError").remove();
		var currForm = $(this).closest("form");
		var errorCount = 0;

		var classification = $.trim($("#classification").val());
		
		if(classification == ""){
			$(errorElementStart + "Please enter classification."+errorElementEnd).insertAfter($("#classification"));
			errorCount++;
		}
				
		if(errorCount == 0){
			$("#add_lead_classification_form").submit();
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
