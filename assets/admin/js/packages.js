var errorElementStart = "<div class='formError'><span>";
var errorElementEnd = "</span></div>";
$(document).ready(function(){
	$(".add-more").on("click",function(){
		$($(".append-empty-fields").html()).appendTo("#add_package_form .card-body .append-to-wrapper");
	});
	
	$(".package_description").each(function(){
		if($(this).val().length == 0){
			$(this).next("span").text($(this).attr("maxlength"));
		}
		else{
			var currLength = $(this).val().length;
			var allowedLength = $(this).attr("maxlength");
			$(this).next("span").text(allowedLength - currLength);
		}
	});
	//$("#package_name").next("span").text($("#package_name").attr("maxlength"));
	if($("#package_name").val().length == 0){
		$("#package_name").next("span").text($("#package_name").attr("maxlength"));
	}
	else{
		var currLength = $("#package_name").val().length;
		var allowedLength = $("#package_name").attr("maxlength");
		$("#package_name").next("span").text(allowedLength - currLength);
	}
	$("#package_name").on("keyup paste", function(){
		var currLength = $(this).val().length;
		var allowedLength = $(this).attr("maxlength");
		$(this).next("span").text(allowedLength - currLength);
		
	});
	
});

$(document).on("click", ".remove-more", function(){
	$(this).parent().prev(".form-group").remove();
	$(this).parent().prev(".form-group").remove();
	$(this).parent().remove();
});

$(document).on("keyup paste", ".package_description", function(){
	console.log($(this).val().length);
	var currLength = $(this).val().length;
	var allowedLength = $(this).attr("maxlength");
	$(this).next("span").text(allowedLength - currLength);	
});