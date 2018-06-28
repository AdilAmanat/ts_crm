var errorElementStart = "<div class='formError'><span>";
var errorElementEnd = "</span></div>";
$(document).ready(function(){
	$("#add_handset_color_submit").on("click", function(e){
		//return true;
		e.preventDefault();
		$("#add_handset_color_form .formError").remove();
		var currForm = $(this).closest("form");
		var errorCount = 0;

		var color = $.trim($("#color").val());
		
		if(color == ""){
			$(errorElementStart + "Please enter handset color."+errorElementEnd).insertAfter($("#color"));
			errorCount++;
		}
				
		if(errorCount == 0){
			$("#add_handset_color_form").submit();
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
