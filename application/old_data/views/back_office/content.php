<?php echo "<pre>";print_r($numbers); echo "</pre>"; ?>
<div class="site-wrapper">
	<div class="main-wrappper">
        <div style="width:100%;margin-top:50px;" id="filter-div-bottom">
            <table cellspacing="0" cellpadding="0" style="width:100%;">
                <tr>
                    <td colspan="6">
                    	<form action="/back_office/upload_data" id="upload_csv_form" enctype="multipart/form-data" method="post">
                    		<input type="file" id="upload_csv" name="csv_file" value="Upload CSV" />
                    		<input type="submit" class="upload_csv_submit" value="Import CSV" style="float:left;"/>
                        </form>
                    </td>
                </tr>
            </table>
        </div>            
    </div>
</div>

<script>
	var errorElementStart = "<div class='formError'><span>";
	var errorElementEnd = "</span></div>";
	var token;
	var export_target;
	$(document).ready(function(){
		$(".upload_csv_submit").click(function(e){
			e.preventDefault();
			if($("#upload_csv").val() == ""){
				alert("Please select CSV file.");
				return;
			}
			else{
				$("#upload_csv_form").submit();
			}
		});
	});
</script>