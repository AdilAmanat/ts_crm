var errorElementStart = "<div class='formError'><span>";
var errorElementEnd = "</span></div>";
$(document).ready(function(){
	$("#avatar_upload").change(function() {
	  readURL(this);
	});
	//Admin : 1, Data Entry: 2, TL BO: 13, Back Office: 3, TL Agent: 4, Telesales Agent: 5, CSR: 6, TL CSR: 10, DSE:7, TL DSE: 11, Sales Manager: 8, Manager: 9
	$(".user_type").on("click", function(){
		
		if(($(this).val() == 4 && $(this).prop("checked")) || ($(this).val() == 10 && $(this).prop("checked") || ($(this).val() == 11 && $(this).prop("checked")) || ($(this).val() == 13 && $(this).prop("checked")))){
			$(".manager_select").show();
			$("#manager_id").prop("disabled", false);
			console.log("show manager dropdown");
				//return;
		}
		else{
			if($(".user_type[value='4']:checked").length == 0 && $(".user_type[value='10']:checked").length == 0 && $(".user_type[value='11']:checked").length == 0 && $(".user_type[value='13']:checked").length == 0){
				$(".manager_select").hide();
				$("#manager_id").prop("disabled", true);
				console.log("hide manager dropdown");
			}
		}
		
		if(($(".user_type[value='13']:checked").length == 0) && ($(".user_type[value='3']:checked").length == 1)){
			console.log("condition true TL BO");
			showWrapper = false;
			$(".teamlead_bo_select").show();
			$("#teamlead_bo").prop("disabled", false);
			console.log("show teamlead bo dropdown");
			//return;
		}
		else{
			$(".teamlead_bo_select").hide();
			$("#teamlead_bo").prop("disabled", true);
			console.log("hide teamlead bo dropdown");
		}
		
		if(($(".user_type[value='4']:checked").length == 0) && ($(".user_type[value='5']:checked").length == 1)){
			console.log("condition true TL Agent");
			showWrapper = false;
			$(".teamlead_agent_select").show();
			$("#teamlead_agent").prop("disabled", false);
			console.log("show teamlead agent dropdown");
			//return;
		}
		else{
			$(".teamlead_agent_select").hide();
			$("#teamlead_agent").prop("disabled", true);
			console.log("hide teamlead agent dropdown");
		}
		
		if(($(".user_type[value='10']:checked").length == 0) && ($(".user_type[value='6']:checked").length == 1)){
			console.log("condition true TL CSR");
			showWrapper = false;
			$(".teamlead_csr_select").show();
			$("#teamlead_csr").prop("disabled", false);
			console.log("show teamlead csr dropdown");
			//return;
		}
		else{
			$(".teamlead_csr_select").hide();
			$("#teamlead_csr").prop("disabled", true);
			console.log("hide teamlead csr dropdown");
		}
		
		if(($(".user_type[value='11']:checked").length == 0) && ($(".user_type[value='7']:checked").length == 1)){
			console.log("condition true DSE CSR");
			showWrapper = false;
			$(".teamlead_dse_select").show();
			$("#teamlead_dse").prop("disabled", false);
			console.log("show teamlead dse dropdown");
			//return;
		}
		else{
			$(".teamlead_dse_select").hide();
			$("#teamlead_dse").prop("disabled", true);
			console.log("hide teamlead dse dropdown");
		}
			
		/*console.log("clicked");
		var showWrapper = true;
		$(".user_type:checked").each(function(){
			if(($(this).val() == "5" && $(".user_type[value='4']:checked").length == 0) && ($(this).val() == "6" && $(".user_type[value='10']:checked").length == 0)){
				console.log("condition true");
				showWrapper = false;
				$(".teamlead_select").show();
				$("#teamlead_id").prop("disabled", false);
				console.log("show teamlead dropdown");
				//return;
			}
			else{
				if(showWrapper){
					$(".teamlead_select").hide();
					$("#teamlead_id").prop("disabled", true);
					console.log("hide teamlead dropdown");
				}
			}
			
			
			
			
		});*/
		
	});
	/*$("#user_type").on("click", function(){
		$("#user_type option:selected").each(function(){
			if($(this).val() == "5" && $("#user_type option[value='4']:selected").length == 0){
				
				$(".teamlead_select").show();
				$("#teamlead_id").prop("disabled", false);
			}
			else{
				$(".teamlead_select").hide();
				$("#teamlead_id").prop("disabled", true);
			}
		});
		
	});*/
	$("#add_user_submit").on("click", function(e){
		//return true;
		e.preventDefault();
		$("#add_user_form .formError").remove();
		var currForm = $(this).closest("form");
		var errorCount = 0;

		var username = $.trim($("#username").val());
		var password = $.trim($("#password").val());
		var first_name = $.trim($("#first_name").val());
		var last_name = $.trim($("#last_name").val());
		var is_active = $.trim($("#is_active").val());
		var user_type = $.trim($("#user_type").val());
		var call_center = $.trim($("#call_center").val());
		var email = $.trim($("#email").val());
		
		if(username == ""){
			$(errorElementStart + "Please enter username."+errorElementEnd).insertAfter($("#username"));
			errorCount++;
			console.log("6");
		}
		
		/*if(password == ""){
			$(errorElementStart + "Please enter password."+errorElementEnd).insertAfter($("#password"));
			errorCount++;
		}*/
		/*else */if(password != "" && password.length < 5){
			$(errorElementStart + "Please enter minimum 6 characters password."+errorElementEnd).insertAfter($("#password"));
			errorCount++;
		}
		if(first_name == ""){
			$(errorElementStart + "Please enter first name."+errorElementEnd).insertAfter($("#first_name"));
			errorCount++;
		}
		if(last_name == ""){
			$(errorElementStart + "Please enter last name."+errorElementEnd).insertAfter($("#last_name"));
			errorCount++;
		}
		if(email == ""){
			$(errorElementStart + "Please enter email."+errorElementEnd).insertAfter($("#email"));
			errorCount++;
		}
		else if(!validateEmail(email)){
			errorCount++;
			$(errorElementStart + "Please enter valid email."+errorElementEnd).insertAfter($("#email"));
		}
		if(is_active == ""){
			$(errorElementStart + "Please select active status."+errorElementEnd).insertAfter($("#is_active"));
			errorCount++;
		}
		
		if(call_center == ""){
			$(errorElementStart + "Please select call center."+errorElementEnd).insertAfter($("#call_center"));
			errorCount++;
		}
		
		if($(".user_type:checked").length == 0){
			$(errorElementStart + "Please select at least one user type."+errorElementEnd).insertAfter($("label[for='user_type']"));
			errorCount++;
		}
		/*else{
			if($("#user_type option[value='4']:selected").length == 0 && $("#user_type option[value='5']:selected").length == 1)
		}*/
		if(!$("#teamlead_id").prop("disabled") && $("#teamlead_id").val() == ""){
			$(errorElementStart + "Please select teamlead."+errorElementEnd).insertAfter($("#teamlead_id"));
			errorCount++;
		}
		
		
		if(!$("#manager_id").prop("disabled") && $("#manager_id").val() == ""){
			$(errorElementStart + "Please select Manager."+errorElementEnd).insertAfter($("#manager_id"));
			errorCount++;
		}
		
		
		if(errorCount == 0){
			$("#add_user_form").submit();
			/*$.ajax({
				url: "/admin/stores/check_duplicate_store",
				type: 'POST',
				data: {
					'store_name':$("#title").val(),
					'category_id':$("#category").val(),
				},           
				success: function(response){
					console.log("response"+response);
					if(response == "ture"){
						$("#add_store_form").submit();
					}
					else{
						$(errorElementStart + "store already exists."+errorElementEnd).insertAfter($("#title"));
						return false;
					}
				}
			});*/
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
function readURL(input) {
  if (input.files && input.files[0]) {
	  var files = input.files;
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#user_avatar_upload').attr('src', e.target.result).show();
	  $("#avatar").val(input.files[0].name);
	  
    }
    reader.readAsDataURL(input.files[0]);
  }
}

function validateEmail(email) {
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}