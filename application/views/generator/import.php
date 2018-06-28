<?php //echo "<pre>"; print_r($numbers); echo "</pre>";//exit;?>
<div class="site-wrapper">
	<div class="main-wrappper">       
        <?php
		if(count($numbers) > 0){
		?>
            <div style="width:100%;" id="generated_numbers" class="update_series_wrapper">
            	<h3>Update Series</h3>
                    <table cellspacing="0" cellpadding="0" style="width:100%;">
                    	<th style='width:20%;'>Sr. No.</th>
                        <th style='width:20%;'>Number</th>
                        <th>Emirates ID</th>
                        <th>Package Rate Plan</th>
                        <th>Package Classification</th>
                        <th>Contract Tenure</th>
                        <th>Activation Date</th>
                        
						<?php
                        foreach($numbers as $key => $num){
							$class = (isset($num["is_duplicate"]) &&  $num["is_duplicate"] == "yes")?"duplicate":"unique";
                            ?>
                        <tr class="<?php echo $class;?>">
                            <td style='width:20%;'><?php echo $key + 1;?></td>
                            <td style='width:20%;' class="number_td"><a href="tel:<?php echo $num["number"];?>"><?php echo $num["number"];?></a></td>
                            <td><?php echo $num["emirate_id"];?></td>
                            <td><?php echo $num["package_rate_plan"];?></td>
                            <td><?php echo $num["package_classification"];?></td>
                            <td><?php echo $num["contract_tenure"];?></td>
                            <td><?php echo date("m F, Y", strtotime($num["date_added"]));?></td>
                        </tr>
                            <?php
                        }
							?>
                    </table>
                </div>
                
                <div style="width:100%;margin-top:50px;" id="filter-div-bottom">
                <table cellspacing="0" cellpadding="0" style="width:100%;">
                    <tr>
                        <td colspan="6"><select id="save_option" style="float:left;margin-right:15px;"><option value="all">All</option><option value="unique">Exclude Duplicates</option></select><input type="button" class="save_series" value="Save Series" style="float:left;"/> <input type="button" id="validate_no" value="Validate" style="float:right;"/></td>
                    </tr>
                </table>
            </div>
        <?php
		}
		?>
    </div>
</div>
<style>
.custom-file-upload{
	margin-top: 17px;
    margin-right: 10px;
    float: left;
}
#filter-div-bottom{
	border:none !important;
}
</style>
<script>
	var token = '<?php echo $token;?>';
	$(document).ready(function(){
		
		$(".save_series").click(function(){
			/*if($("#generated_numbers tbody .duplicate").length > 0){
				alert("Please remove duplicate numbers before save.");
				return;
			}*/
			console.log("clicked");
			var selectClass = '';
			if($("#save_option").val() == "all"){
				selectClass = "#generated_numbers tbody .unique, #generated_numbers tbody .duplicate";
			}
			if($("#save_option").val() == "unique"){
				selectClass = "#generated_numbers tbody .unique";
			}
			var counter = 1, total_records = $(selectClass).length, iteration = 0;

			var TableData = new Array();
			$(selectClass).each(function(index, element){
				TableData[iteration] = {
					"number" : 	     $(element).find('td:eq(1)').text(),
					"emirate_id" :   $(element).find('td:eq(2)').text(),
					"package_rate_plan" :   $(element).find('td:eq(3)').text(),
					"package_classification" :   $(element).find('td:eq(4)').text(),
					"contract_tenure" :   $(element).find('td:eq(5)').text(),
					"activation_date" :   $(element).find('td:eq(6)').text(),
					"export_token" : token
				}
				
				if(counter == 10 || ((index + 1) == total_records)){
					var TableData1 = JSON.stringify(TableData);
					delete TableData;
					TableData = new Array();
					 $.ajax({
						type: "POST",
						url: "/back-office/save-imported-numbers",
						data: "pTableData=" + TableData1,
						success: function(msg){
							console.log(msg);
						}
					});
					counter = 0 ;iteration = -1;
				}			
				counter++;
				iteration++;
				 
			});
		});
		$(document).ajaxStop(function() {
			//console.log("all ajax complete");
			//return;
			//window.location = "/generate/save-series/?token="+token+"&status=completed";
			$("#filter-div-bottom, #generated_numbers").remove();
			alert("Numbers saved successfully.");
		});
		
		$("#validate_no").click(function(){
			if($(".duplicate").length == 0){
				alert("There is no duplicate number.");
			}
			else
				$(".duplicate").css("background" ,"#97bece"); 
		});
		$("#generate_no").click(function(e){
			e.preventDefault();
			var error_count = 0;
			var error_msg = "";
			var series_start = $.trim($("#series_start").val());
			var series_end   = $.trim($("#series_end").val());
			var order_type   = $.trim($("#order_type").val());
			var total_no     = $.trim($("#total_no").val());
			//var sequence     = $.trim($("#sequence").val());
			
			if(series_start == "" && series_end == "" && total_no == ""){
				error_msg = "Please select option to generate.\n";
				error_count++;
			}
			
			if(series_start == "" && series_end == "" && total_no != ""){
				error_msg = "Please enter starting range to generate.\n";
				error_count++;
			}
			
			if(series_start != "" && series_end == "" && total_no == ""){
				error_msg = "Please enter series end or total numbers to generate.\n";
				error_count++;
			}
			
			if(series_start != "" || series_end != ""){
				if(series_start > series_end){
					error_msg = "Series start number should be less then series end number\n";
					error_count++;
				}
				if((series_start[0] != "0" || series_start[1] != "5") && series_start != ""){
					error_msg = "Series start number should start from 05\n";
					error_count++;
				}
				
				if((series_end[0] != "0" || series_end[1] != "5")  && series_end != ""){
					error_msg = "Series end number should start from 05\n";
					error_count++;
				}
				
			}
			
			if(error_count != 0){
				alert(error_msg);
				return false;
			}
			
			$("#generated_numbers table").html("");
			window.location = "/generate/generate_numbers/?"+$("#generate_numbers_form").serialize();
		
		return false;
			
		});
	});
	
</script>