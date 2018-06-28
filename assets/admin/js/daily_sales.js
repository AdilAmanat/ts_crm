var errorElementStart = "<div class='formError'><span>";
var errorElementEnd = "</span></div>";
$(document).ready(function(){
	$("#attachments").on("change", function() {
         if($("#attachments")[0].files.length > 2) {
            alert("You can select only 6 images");
			$("#attachments").val("");
         }
		 else{
		 	var fi = document.getElementById('attachments');
			var total_size_uoloaded = 0;
			var allowed_size = 31457280; //30MB
			for (var i = 0; i <= fi.files.length - 1; i++) {
				//var fname = fi.files.item(i).name;
				var fsize = fi.files.item(i).size;
				total_size_uoloaded += fsize;
				//console.log( fname + ' (<b>' + fsize + '</b> bytes)');
			}
			if(total_size_uoloaded > 31457280)
				alert("Attachement size should not more then 30MB.");
				$("#attachments").val("");
		 }
    });
});
