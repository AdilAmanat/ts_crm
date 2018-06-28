<div class="page-content">
  <div class="container">
  <div class="row">
        <div class="col-12">
            <form class="card" id="generate_numbers_form" action="/generate/generate_numbers" method="post">
                <div class="card-header">
                    <h3 class="card-title">Generate Numbers</h3>
                </div>
                <div class="card-body">
                	<div class="row">
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Series Start', 'series_start', array('class' => 'form-label'));?>
                                <input type="text" id="series_start" name="series_start" placeholder="Series start" value="<?php echo (isset($filters["series_start"]) && $filters["series_start"] != "")?$filters["series_start"]:"";?>" class="form-control"/>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Series End', 'series_end', array('class' => 'form-label'));?>
                                <input type="text" id="series_end" name="series_end" placeholder="Series end" value="<?php echo (isset($filters["series_end"]) && $filters["series_end"] != "")?$filters["series_end"]:"";?>" class="form-control"/>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Order Type', 'order_type', array('class' => 'form-label'));?>
                                <select name="order_type" id="order_type" class="form-control custom-select">
                                    <option value="">Please Select</option>
                                    <option value="odd" <?php echo (isset($filters["order_type"]) && $filters["order_type"] == "odd")?"selected":"";?>>All Odd</option>
                                    <option value="even" <?php echo (isset($filters["order_type"]) && $filters["order_type"] == "even")?"selected":"";?>>All Even</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Total Numbers', 'total_no', array('class' => 'form-label'));?>
                                <input type="text" id="total_no" name="total_no" placeholder="Total Numbers" value="<?php echo (isset($filters["total_no"]) && $filters["total_no"] != "")?$filters["total_no"]:"";?>" class="form-control"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                  <div class="d-flex">
                    <button type="submit" class="btn btn-primary ml-auto generate_no" id="generate_no">Generate</button>
                  </div>
                </div>                        
            </form>
        </div>
    </div>
    <?php if(isset($numbers) && count($numbers)){?>
    <div class="row row-cards row-deck generated_numbers">
                    <div class="col-12">
                    <div class="card">
                      <div class="table-responsive" id="generated_numbers">
                        <table class="table card-table table-vcenter text-nowrap">
                          <thead>
                            <tr>
                              <th class="w-1">No.</th>
                              <th>Number</th>
                              <?php /*?><th>Emirates ID</th><?php */?>
                              <th>Number Status</th>
                              <th>DB Status</th>
                              
                            </tr>
                          </thead>
                          <tbody>
                          <?php
						  foreach($numbers as $key  => $number){
							  $class = (isset($number["is_duplicate"]) &&  $number["is_duplicate"] == "yes")?"duplicate":"unique";
							?>
                            <tr class=<?php echo $class;?>>
                              <td><span class="text-muted"><?php echo ++$key;?></span></td>
                              <td><?php echo $number["number"];?></td>
                              <?php /*?><?php $emirate_id = ($number["emirate_id"] == "")?"-":$number["emirate_id"]; ?>
                              <td><?php echo $emirate_id;?></td><?php */?>
                              <?php $status = ($number["back_ofice_status"] == "")?"New":$number["back_ofice_status"];?>
                              <td><?php echo $status;?></td>
                              <th><?php echo ucwords($class);?></th>
                            </tr>
                          <?php }?>
                          </tbody>
                        </table>
                      </div>
                      <div class="card-footer">
                  <div class="d-flex">
                  	<div class="col-md-3 col-lg-3">
                    </div>
                      <div class="col-md-3 col-lg-3">
                      <label class="form-label">Select Exclusion</label> <select id="save_option" class="form-control custom-select"><option value="all">All</option><option value="unique">Exclude Duplicates</option></select>
                      
                      </div>
                  <div class="col-md-3 col-lg-3">
                  <label class="form-label">Select Data Source</label>
                  	<select id="data_source" class="form-control custom-select">
                    	<option value="">Please select Data Source</option>
                        <?php foreach($data_sources as $data_source){?>
                        <option value="<?php echo $data_source["id"]?>"><?php echo $data_source["source"]?></option>
                        <?php }?>
                    </select>
                  </div>
                  <div class="col-md-3 col-lg-3  text-right">
                  <input type="button" class="save_series btn btn-primary ml-auto" value="Save Series" />
                  </div>
                  <?php /*?><div class="col-md-3 col-lg-3">
                  	 <input class="btn btn-primary ml-auto" type="button" id="validate_no" value="Validate" style="float:right;"/>
                  </div><?php */?>
                  
                    <?php /*?><button type="submit" class="btn btn-primary ml-auto add_kiosk_submit" id="add_kiosk_submit">Kiosk</button><?php */?>
                  </div>
                </div>
                    </div>
                  </div>
                </div>
    <?php }?>
  <?php
		/* if(isset($series) && count($series) > 0){
		?>
        <div class="row row-cards row-deck generated_numbers">
                    <div class="col-12">
                    <div class="card">
                      <div class="table-responsive" id="generated_numbers">
                      <div class="card-header">
                         <h3>Ready for validation</h3>
                        </div>
            	
                    <table class="table card-table table-vcenter text-nowrap">
                    	<th style='width:20%;'>Sr. No.</th>
                        <th>Total Numbers</th>                        
                        <th>Start Number</th>
                        <th>End Number</th>
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
                
        <?php
		} */
		?>
     
    
                
                
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