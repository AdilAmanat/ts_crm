<div class="page-content">
  <div class="container">
  <?php
		if(isset($series) && count($series) > 0){
		?>
        <div class="row row-cards row-deck generated_numbers">
                    <div class="col-12">
                    <div class="card">
                      <div class="table-responsive" id="generated_numbers">
                      <div class="card-header">
                         <h3><?php echo $c_page_title; ?></h3>
                        </div>
            	
                    <table class="table card-table table-vcenter text-nowrap">
                    	<th style='width:20%;'>Sr. No.</th>
                        <th>Total Numbers</th>                        
                        <th>Start Number</th>
                        <th>End Number</th>
                        <th>Data Source</th>
                        <th>Date Added</th>
                        <th>Delete</th>
                        <th>Update</th>
                        
						<?php
                        foreach($series as $key => $num){
                            ?>
                        <tr>
                            <td style='width:20%;'><?php echo $key + 1;?></td>
                            <td style='width:20%;'><?php echo $num["total_numbers"];?></td>
                            <td style='width:20%;'>0<?php echo $num["start_number"];?></td>
                            <td style='width:20%;'>0<?php echo $num["end_number"];?></td>
                            <td style='width:20%;'><?php echo $num["source"];?></td>  
                            <td><?php echo date("d F, Y", strtotime($num["date_added"]));?></td>
                            <td><a href="/generate/delete-series/<?php echo $num["export_token"];?>" class="update-btn">Delete</a></td>
                            <td><a href="/generate/update-series/<?php echo $num["export_token"];?>" class="update-btn">Update</a></td>
                        </tr>
                            <?php
                        }
							?>
                        
                    </table>
                </div>
                </div></div></div>
                
              <?php } else { ?>
                <div class="row row-cards row-deck generated_numbers">
                  <div class="col-12">
                    <div class="card">
                      <div class="table-responsive" id="generated_numbers">
                        <div class="card-header">
                         <h3><?php echo $c_page_title; ?></h3>
                       </div>

                       <table class="table card-table table-vcenter text-nowrap">
                        <tbody>
                          <tr>
                            <td colspan="100">No record(s) found!</td>
                          </tr>

                        </tbody></table>
                      </div>
                    </div>
                  </div>
                </div>
              <?php } ?>
     
    
                
                
   </div>
</div>

<script>
	var errorElementStart = "<div class='formError'><span>";
	var errorElementEnd = "</span></div>";
	var token;
	$(document).ready(function(){
		
		$(".save_series").click(function(){
			errorMsg = "";
			if($("#generated_numbers tbody .duplicate").length ==  ($("#generated_numbers tbody tr").length)){
				errorMsg = "Please remove duplicate numbers before save.\n";
			}
			else if($("#data_source").val() == ""){
				errorMsg = "Please select data source.\n";
			}
			
			if(errorMsg != ""){
				alert(errorMsg);
				return;
			}
			token = makeid();
			var selectClass = '';
			if($("#save_option").val() == "all"){
				selectClass = "#generated_numbers tbody .unique, #generated_numbers tbody .duplicate";
			}
			if($("#save_option").val() == "unique"){
				selectClass = "#generated_numbers tbody .unique";
			}
			var counter = 1, total_records = $(selectClass).length, iteration = 0;
			$(this).prop("disabled", true);
			var TableData = new Array();
			$(selectClass).each(function(index, element){
				TableData[iteration] = {
					"number" : 	     $(element).find('td:eq(1)').text(),
					//"emirate_id" :   $(element).find('td:eq(2)').text(),
					"status" : 	     $(element).find('td:eq(2)').text(),
					"data_source" :   $("#data_source").val(),
					"export_token" : token
				}
				
				if(counter == 10 || ((index + 1) == total_records)){
					var TableData1 = JSON.stringify(TableData);
					console.log(TableData1);
					delete TableData;
					TableData = new Array();
					 $.ajax({
						type: "POST",
						url: "/generate/update_numbers",
						data: "pTableData=" + TableData1,
						success: function(msg){
							//console.log(msg);
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
			$("#filter-div-bottom, .generated_numbers").remove();
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
				if((series_start > series_end) && (series_start != "" && series_end != "")){
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
	
	function makeid() {
	  var text = "";
	  var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
	
	  for (var i = 0; i < 20; i++)
		text += possible.charAt(Math.floor(Math.random() * possible.length));
	
	  return text;
	}
</script>

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
				$(this).prop("disabled", true);
				$("#upload_csv_form").submit();
			}
		});
	});
</script>