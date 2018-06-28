var errorElementStart = "<div class='formError'><span>";
var errorElementEnd = "</span></div>";
$(document).ready(function(){
	$("#users_clear_filter").on("click", function(){
		window.location = window.location.origin +  window.location.pathname;
	});
	$("#users_apply_filter").on("click", function(e){
		e.preventDefault();
		var username = $.trim($("#username").val());
		var call_center = $.trim($("#call_center").val());
		var privilege = $.trim($("#privilege").val());
		if(username == "" && call_center == "" && privilege == ""){
			alert("Please select at least one filter to apply.");
		}
		else{
			$("#user_apply_filters_form").submit();
		}
	});
});