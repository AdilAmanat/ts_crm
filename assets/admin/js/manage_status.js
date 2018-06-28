var errorElementStart = "<div class='formError'><span>";
var errorElementEnd = "</span></div>";
$(document).ready(function(){
	$("#add_tsa_status_submit").on("click", function(e){
		//return true;
		e.preventDefault();
		$("#add_tsa_status_form .formError").remove();
		var currForm = $(this).closest("form");
		var errorCount = 0;

		var status = $.trim($("#status").val());
		var color = $.trim($("#color").val());
		
		if(status == ""){
			$(errorElementStart + "Please enter status."+errorElementEnd).insertAfter($("#status"));
			errorCount++;
		}
				
		if(errorCount == 0){
			$("#add_tsa_status_form").submit();
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
	
	$('#colorSelector').ColorPicker({
		//color: $("#color").val(),
		onShow: function (colpkr) {
			$(colpkr).fadeIn(500);
			return false;
		},
		onHide: function (colpkr) {
			$(colpkr).fadeOut(500);
			return false;
		},
		onChange: function (hsb, hex, rgb) {
			$('#colorSelector div').css('backgroundColor', '#' + hex);
			$("#color").val('#'+ hex);
		}
	});
});
