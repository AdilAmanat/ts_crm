<?php //echo "<pre>"; print_r($filters); print_r($numbers); echo "</pre>"; ?>
<div class="site-wrapper">
	<div class="main-wrappper">
    	<div style="width:100%;" id="filter-div">
        	<table cellspacing="0" cellpadding="0">
            	<form id="generate_numbers_form" action="/home/generate_numbers">
                    <tr>
                        <td><label for="series_start">Series Start</label><br/><input type="text" id="series_start" name="series_start" placeholder="Series start" value="<?php echo (isset($filters["series_start"]) && $filters["series_start"] != "")?$filters["series_start"]:"";?>"/></td>
                        <td><label for="series_end">Series End</label><br/><input type="text" id="series_end" name="series_end" placeholder="Series end" value="<?php echo (isset($filters["series_end"]) && $filters["series_end"] != "")?$filters["series_end"]:"";?>"/></td>
                        <td>
                            <label for="series_end">Order Type</label><br/>
                            <select name="order_type" id="order_type">
                                <option value="">Please Select</option>
                                <option value="odd" <?php echo (isset($filters["order_type"]) && $filters["order_type"] == "odd")?"selected":"";?>>All Odd</option>
                                <option value="even" <?php echo (isset($filters["order_type"]) && $filters["order_type"] == "even")?"selected":"";?>>All Even</option>
                            </select>
                        </td>
                        <?php /*?><td>
                            <label for="sequence">Sequence</label><br/>
                            <select name="sequence" id="sequence">
                                <option value="">Please Select</option>
                                <option value="sequence" <?php echo (isset($filters["sequence"]) && $filters["sequence"] == "sequence")?"selected":"";?>>Sequence</option>
                                <option value="random" <?php echo (isset($filters["sequence"]) && $filters["sequence"] == "random")?"selected":"";?>>Random</option>
                            </select>
                        </td><?php */?>
                        <td><label for="total_no">Total Numbers</label><br/><input type="number" id="total_no" name="total_no" placeholder="Total Numbers" min="0" oninput="this.value = Math.abs(this.value)" value="<?php echo (isset($filters["total_no"]) && $filters["total_no"] != "")?$filters["total_no"]:"";?>"/></td>
                        <td><input type="submit" id="generate_no" value="Generate"/></td>
                    </tr>
                </form>
            </table>
        </div>
        
        <?php if(isset($numbers) && count($numbers)){?>
            <div style="width:100%;margin-top:50px;" id="generated_numbers">
                <table cellspacing="0" cellpadding="0">
                	<thead>
                        <th style='width:20%;'>Sr. No.</th>
                        <th>Number</th>
                        <th>Emirates ID</th>
                        <th>Status</th>
                    </thead>
                    <tbody>
                    
						<?php
                        $counter = 1;
                        foreach($numbers as $key  => $number){
							$class = (isset($number["is_duplicate"]) &&  $number["is_duplicate"] == "yes")?"duplicate":"unique";
							echo "<tr class='".$class."'>";
								echo "<td style='width:20%;'>".($key + 1)."</td>";
								echo "<td>".$number["number"]."</td>";
								$emirate_id = ($number["emirate_id"] == "")?"-":$number["emirate_id"];
								echo "<td>".$emirate_id ."</td>";
								$status = ($number["status"] == "")?"New":$number["status"];
								echo "<td>".$status."</td>";
							echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div style="width:100%;margin-top:50px;" id="filter-div-bottom">
                <table cellspacing="0" cellpadding="0" style="width:100%;">
                    <tr>
                        <td colspan="6"><select id="export_option" style="float:left;margin-right:15px;"><option value="all">All</option><option value="unique">Exclude Duplicates</option></select><input type="button" class="export_no excel" value="Export Excel" style="float:left;"/> <input type="button" class="export_no csv" value="Export CSV" style="float:left;"/> <input type="button" id="validate_no" value="Validate" style="float:right;"/></td>
                    </tr>
                </table>
            </div>
        <?php }else{?>
        	
        	<?php /*?><div style="width:100%;margin-top:50px;" id="filter-div-bottom">
                <table cellspacing="0" cellpadding="0" style="width:100%;">
                    <tr>
                        <td colspan="6"><form enctype="multipart/form-data" method="post" id="excel_import_form" action="/home/excel_import"><input type="file" name="excel_file_name" id="excel_file_name" style="float:right;"/> <input type="submit" id="excel_import" value="Excel Import" style="float:right;"/></form></td>
                    </tr>
                </table>
            </div><?php */?>
        <?php }?>
        <div style="width:100%;margin-top:50px;" id="filter-div-bottom">
                <table cellspacing="0" cellpadding="0" style="width:100%;">
                    <tr>
                        <td colspan="6"><form  method="post" id="search_form" action="/home/search"><input type="text" name="number_search" id="number_search" placeholder="Number"/> <input type="text" name="emirate_id_search" id="emirate_id_search" placeholder="Emirates ID" /> <input type="submit" id="search_filter" value="Filter"  /></form></td>
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
		
		$("#emirate_id_search").click(function(e){
			e.preventDefault();
			if($("#number_search").val() == ""){
				alert("Please enter number.");
				return;
			}
			else{
				$("#search_form").submit();
			}
		});
		
		$("#excel_import").click(function(e){
			e.preventDefault();
			if($("#excel_file_name").val() == ""){
				alert("Please select excel file.");
				return;
			}
			else{
				$("#excel_import_form").submit();
			}
		});
		
		$(".export_no").click(function(){
			token = makeid();
			export_target = ($(this).hasClass("excel"))?"export_excel":"export_csv";
			console.log(export_target, $(this).hasClass("excel"));//return;
			var selectClass = '';
			if($("#export_option").val() == "all"){
				selectClass = "#generated_numbers tbody .unique, #generated_numbers tbody .duplicate";
			}
			if($("#export_option").val() == "unique"){
				selectClass = "#generated_numbers tbody .unique";
			}
			var counter = 1, total_records = $(selectClass).length, iteration = 0;

			var TableData = new Array();
			$(selectClass).each(function(index, element){
				TableData[iteration] = {
					"number" : 	     $(element).find('td:eq(1)').text(),
					"emirate_id" :   $(element).find('td:eq(2)').text(),
					"status" : 	     $(element).find('td:eq(3)').text(),
					"export_token" : token
				}
				
				if(counter == 10 || ((index + 1) == total_records)){
					var TableData1 = JSON.stringify(TableData);
					delete TableData;
					TableData = new Array();
					 $.ajax({
						type: "POST",
						url: "/home/update_numbers",
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
			window.location = "/home/"+export_target+"/?token="+token+"&status=completed";
			/*$.ajax({
				type: "POST",
				url: "/home/export_excel",
				global: false,
				data: {
					token : token,
					"status" : "completed"
				},
				success: function(msg){
					//console.log(msg);
				}
			});*/
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
			window.location = "/home/generate_numbers/?"+$("#generate_numbers_form").serialize();
		
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