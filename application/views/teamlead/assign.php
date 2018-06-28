<div class="page">
      <div class="page-main">
          <div class="page-content">
              <div class="container">
                <div class="row row-cards row-deck update_series_wrapper" id="generated_numbers">
                <?php if(isset($numbers) && count($numbers)){?>
                    <div class="col-12">
                    <div class="card">
                    	<div class="card-header">
	                        <h3><?php echo $c_page_title; ?></h3>
	                      </div>
                      <div class="card-body">
                	<div class="row">
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Telesale Agent', 'team_member', array('class' => 'form-label'));?>
                                <select name="team_member" id="team_member" class="form-control custom-select">
                                    <option value="">Please Select</option>
                                    <?php
                                        foreach($team_members as $team_member){
                                            ?>
                                            <option value="<?php echo $team_member["id"]?>"><?php echo $team_member["first_name"] . " " .$team_member["last_name"];?></option>
                                            <?php
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <?php /*?><div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Assign to each team member', 'no_count_for_tsa', array('class' => 'form-label'));?>
                               <input type="text" id="no_count_for_tsa" name="no_count_for_tsa" placeholder="Numbers to each TSA" value=""/>
                            </div>
                        </div><?php */?>
                        <div class="col-md-2 col-lg-2">
                            <div class="form-group">
                                <?php echo form_label('Select All', 'select_all', array('class' => 'form-label'));?>
                                <input type="checkbox" id="select-all" name="select_all" value=""/>
                            </div>
                        </div>
                        <div class="col-md-2 col-lg-2">
                            <div class="form-group">
                                <?php echo form_label('Numbers Count', 'select_amount', array('class' => 'form-label'));?>
                                <input type="number" class="form-control" id="select_amount" name="select_amount" value="" min="1" />
                            </div>
                        </div>
                        <div class="col-md-2 col-lg-2">
                            <div class="form-group">
                                <?php echo form_label('Select Specific', 'select_specific', array('class' => 'form-label'));?>
                                <input type="checkbox" id="select_specific" name="select_specific" value=""/>
                            </div>
                        </div>
                        <div class="col-md-2 col-lg-2">
                            <div class="form-group">
                                <?php echo form_label('Unselect All', 'unselect_all', array('class' => 'form-label'));?>
                                <input type="checkbox" id="unselect-all" name="unselect_all" value=""/>
                            </div>
                        </div>
                        <div class="col-md-1 col-lg-1">
                            <div class="form-group">
                                <button type="button" class="btn btn-primary ml-auto" id="assign_numbers">Assign</button>
                            </div>
                        </div>
                   	</div>
                    </div>
                    <?php if (isset($load_datatable_search) && $load_datatable_search) { ?>
                	<div class="table-responsive">
                		<table border="0" cellspacing="5" cellpadding="5">
                			<tbody>
                				<tr>
	                				<td>Begin:</td>
	                				<td><input type="text" id="min" name="min" class="form-control"></td>
	                				<td>End:</td>
	                				<td><input type="text" id="max" name="max" class="form-control"></td>
	                			</tr>
                			</tbody>
                		</table>
                	</div>
                	<?php } ?>
                      <div class="table-responsive">
                        <table class="jsdatatable assign-table table card-table table-vcenter text-nowrap">
                        <?php if(count($numbers) > 0 ){?>
                          <thead>
                            <tr>
                              <th class="w-1">No.</th>
                              <th style='width:20%;'>Number</th>
                                
                                <?php
                                if($type == "with_feedbacks"){
                                    ?>
                                <th>Emirates ID</th>
                                <th>Last Feedback Date</th>
                                <th>Last Feedback</th>
                                    <?php
                                }
                                ?>
                                <th>Assign</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php
							$counter = 1;
							$token = "";
							//echo "<pre>"; print_r($numbers); echo "</pre>";
							foreach($numbers as $key  => $number){
								$token = $number["export_token"];
								
								$class = (isset($number["is_duplicate"]) &&  $number["is_duplicate"] == "yes")?"duplicate":"unique";
							echo "<tr class='".$class."'>";
								echo "<td style='width:20%;'>".($key + 1)."</td>";
								echo "<td style='width:20%;'>".$number["number"]."</td>";
								$emirate_id = ($number["emirate_id"] == "")?"-":$number["emirate_id"];
								
								if($type == "with_feedbacks"){
									echo "<td>".$emirate_id ."</td>";
									?>
								<td><?php echo date("d F, Y", strtotime($number["feedbacks"][0]["date_added"]))?></td>
								<td><?php echo $number["feedbacks"][0]["feedback"]?></td>
									<?php
								}
						
								//$status = ($number["back_office_status"] == "1")?"Valid":"Invalid";
								//echo "<td>".$status."</td>";
								?>
                                <td><input type="checkbox" name="assign_number_check[]" class="assign_number_check" number_id="<?php echo $number["no_id"]?>"/></td>
                                <?php
							echo "</tr>";
						   }?>
                          
                          </tbody>
                         <?php }else{?>
                        <tr><td>No Records Found!</td></tr>
                        <?php }?>
                        </table>
                        <?php /*if(isset($numbers) && count($numbers)){?>
                        <div class="card-footer text-right">
                              <div class="d-flex">
                                <button type="button" class="btn btn-primary ml-auto" id="assign_numbers">Assign</button>
                              </div>
                            </div>
                            <?php }*/?>
                      </div>
                    </div>
                  </div>
                  <?php }?>
                </div>
              </div>
          </div>
      </div>















<?php /*?><div class="site-wrapper">
	<div class="main-wrappper">
        
        <?php if(isset($numbers) && count($numbers)){?>
            <div style="width:100%;margin-top:50px;" id="generated_numbers">
            	Telesale Agent: <select name="team_member" id="team_member">
                    <option value="">Please Select</option>
                    <?php
						foreach($team_members as $team_member){
							?>
                            <option value="<?php echo $team_member["id"]?>"><?php echo $team_member["first_name"] . " " .$team_member["last_name"];?></option>
                            <?php
						}
					?>
                </select> Assign to each team member: <input type="text" id="no_count_for_tsa" value="" placeholdes="numbers to each TSA"/>Select All: <input type="checkbox" id="select-all" /> Unselect All: <input type="checkbox" id="unselect-all" /> <br/><br/>
                <table cellspacing="0" cellpadding="0">
                	<thead>
                        <th style='width:20%;'>Sr. No.</th>
                        <th style='width:20%;'>Number</th>
                        <th>Emirates ID</th>
                        <?php
						if($type == "with_feedbacks"){
							?>
                        <th>Last Feedback Date</th>
                        <th>Last Feedback</th>
                            <?php
						}
						?>
                        <th>Assign</th>
                    </thead>
                    <tbody>
                    
						<?php
                        $counter = 1;
						//echo "<pre>"; print_r($numbers); echo "</pre>";
                        foreach($numbers as $key  => $number){
							$class = (isset($number["is_duplicate"]) &&  $number["is_duplicate"] == "yes")?"duplicate":"unique";
							echo "<tr class='".$class."'>";
								echo "<td style='width:20%;'>".($key + 1)."</td>";
								echo "<td style='width:20%;'>".$number["number"]."</td>";
								$emirate_id = ($number["emirate_id"] == "")?"-":$number["emirate_id"];
								echo "<td>".$emirate_id ."</td>";
								if($type == "with_feedbacks"){
									?>
								<td><?php echo date("d F, Y", strtotime($number["feedbacks"][0]["date_added"]))?></td>
								<td><?php echo $number["feedbacks"][0]["feedback"]?></td>
									<?php
								}
						
								//$status = ($number["back_office_status"] == "1")?"Valid":"Invalid";
								//echo "<td>".$status."</td>";
								?>
                                <td><input type="checkbox" name="assign_number_check[]" class="assign_number_check" number_id="<?php echo $number["no_id"]?>"/></td>
                                <?php
							echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div style="width:100%;margin-top:50px;" id="filter-div-bottom">
                <table cellspacing="0" cellpadding="0" style="width:100%;">
                    <tr>
                        <td colspan="6"> <input type="button" id="assign_numbers" value="Assign" style="float:right;"/></td>
                    </tr>
                </table>
            </div>
        <?php }?>
            
    </div>
</div><?php */?>

<script>
	$(document).ready(function(){
		$("#assign_numbers").click(function(){
			if($("#assign_numbers").val() == "" && $("#team_member").val() == ""){
				alert("Please select any one option to assign numbers.\n Either select agenet or enter total count to assign each TSA.");
				return;
			}
			if($("input[name='assign_number_check[]']:checked").length == 0){
				alert("Please select at least one number to assign.");
				return;
			}
			//if($("#team_member").val() != ""){
				var TableData = [];
				var iteration = 0;
				$("input[name='assign_number_check[]']:checked").each(function(){
					TableData[iteration] = {
						"id" : $(this).attr("number_id"),
						"assignee" :  $("#team_member").val(),
						"token" : '<?php echo $token;?>'
					}
					/*selected_values.push({
						"id": $(this).attr("number_id"),
						"tsa_id": $("#team_member").val()
					});*/
					iteration++;
				});
				var TableData1 = JSON.stringify(TableData);
				$.ajax({
					type: 'POST',
					url: "/teamlead_agent/assign_numbers_to_individual",
					data: "pTableData=" + TableData1,
					success:function(data){console.log(data);}
				});
			//}
			
		});
		$("#select-all").click(function(){
			$("#unselect-all").prop("checked", false);
			$(".assign_number_check").prop("checked", true);
		});
		
		$("#unselect-all").click(function(){
			$("#select-all").prop("checked", false);
			$(".assign_number_check").prop("checked", false);
		});
		$(document).ajaxStop(function() {
			$("input[name='assign_number_check[]']:checked").each(function(){
				$(this).closest("tr").remove()
			});
			alert("Numbers assigned successfully.");
		});
		
		$("#generate_no").click(function(e){
			e.preventDefault();
			var error_count = 0;
			var error_msg = "";
			var series_start = $.trim($("#series_start").val());
			var series_end   = $.trim($("#series_end").val());
			var emirates_id = $.trim($("#emirates_id").val());
			var package_rate_plan = $.trim($("#package_rate_plan").val());
			var package_classification = $.trim($("#package_classification").val());
			var contract_tenure = $.trim($("#contract_tenure").val());
			//var order_type   = $.trim($("#order_type").val());
			var total_no     = $.trim($("#total_no").val());
			var activation_date_from = $.trim($("#activation_date_from").val());
			var activation_date_till = $.trim($("#activation_date_till").val());
			
			//var sequence     = $.trim($("#sequence").val());
			
			/*if(series_start == "" && series_end == "" && total_no == "" && emirates_id == ""){
				error_msg = "Please select option to generate.\n";
				error_count++;
			}*/
			
			if(series_start == "" && series_end != "" && total_no == "" && emirates_id == "" && package_rate_plan == "" && package_classification == "" && contract_tenure == ""){
				error_msg = "Please select option to generate.\n";
				error_count++;
			}
			
			if(series_start == "" && series_end != ""){
				error_msg = "Please select series start number.\n";
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
			console.log(series_start, series_end);
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
			
			if(activation_date_from == "" && activation_date_till != ""){
				error_msg = "Activation start date is required when date till selected\n";
				error_count++;
			}
			
			if(error_count != 0){
				alert(error_msg);
				return false;
			}
			
			$("#generated_numbers table").html("");
			window.location = "/teamlead/?"+$("#generate_numbers_form").serialize();
		
		return false;
			
		});
	/*	var is_search_bar_datepicker_open = false;
	//var clear_calendar_date = false;
	var open_calendar_id = "";
    $(function() {       
        var b = $("#activation_date_from, #activation_date_till").datepicker({minDate: "-2Y", maxDate: "0", defaultDate: "+1w", dateFormat: "mm/dd/yy", numberOfMonths: 2, showButtonPanel: true, onSelect: function(a) {
			//console.log("onSelect");
                for (var d = 0; d < b.length; ++d) {
                    if (b[d].id < this.id) {
                        $(b[d]).datepicker("option", "maxDate", a)
                    } else {
                        if (b[d].id > this.id) {
                            $(b[d]).datepicker("option", "minDate", a)
                        }
                    }
                }
            }, beforeShow: function(a) {
				open_calendar_id = this.id;
				//console.log("b",b);
				if($("#activation_date_till").val() == ""){
					$("#activation_date_from").datepicker("option", "maxDate", null);
				}
				//if($("#activation_date_from").val() == ""){
					//$("#activation_date_from").datepicker("option", "maxDate", null);
				//}
                setTimeout(function() {
					//console.log("a:",$(a));
                    var e = $(a).datepicker("widget").find(".ui-datepicker-buttonpane");
                    clear_calendar_date = false;
                    var d = $('<button type="button" class="ui-datepicker-close ui-state-default ui-priority-primary ui-corner-all clear_this_date">Clear</button>');
                    d.off("click").on("click", function() {
                        //clear_calendar_date = true;
						//$(a).val("");
						//console.log();
						$("#activation_date_from, #activation_date_till").datepicker("hide");
						$("#"+open_calendar_id).val("");
                        //console.log("beforeShow:", c)
                    });
                    d.appendTo(e);
					is_search_bar_datepicker_open = true;
					
					//$("#ui-datepicker-div").addClass("search-bar-datepicker");
                }, 1)
            },
			onClose: function() {
                
				is_search_bar_datepicker_open = false;
				//$("#ui-datepicker-div").removeClass("search-bar-datepicker");
            }});
        $("#datetimepicker3").datepicker();
		
		
    });
	
	$(document).on('click', '.ui-datepicker-next,.ui-datepicker-prev', function (a) {
		//console.log("is_search_bar_datepicker_open:"+is_search_bar_datepicker_open);
		if(is_search_bar_datepicker_open){
			setTimeout(function() {
				var e = $(a).datepicker("widget").find(".ui-datepicker-buttonpane");
				clear_calendar_date = false;
				var d = $('<button type="button" class="ui-datepicker-close ui-state-default ui-priority-primary ui-corner-all clear_this_date">Clear</button>');
				d.off("click").on("click", function() {
					$("#"+open_calendar_id).val("");open_calendar_id = "";
					$("#activation_date_from, #activation_date_till").datepicker("hide");
					//clear_calendar_date = true;
				});
				d.appendTo(e)
			}, 1)
		}
	});*/
	});
	
</script>