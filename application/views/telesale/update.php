<div class="page">
      <div class="page-main">
          <div class="page-content">
              <div class="container">
                <div class="row row-cards row-deck update_series_wrapper" id="generated_numbers">
                    <div class="col-12">
                    <div class="card">
                      <div class="card-header">
                        <h3>Update Status</h3>
                      </div>
                      <div class="table-responsive">
                        <table class="table card-table table-vcenter text-nowrap">
                        <?php if(count($numbers) > 0 ){?>
                          <thead>
                            <tr>
                              <th class="w-1">No.</th>
                              <th>Number</th>
                              <th>Update Status</th>
                              <th>Comment</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php
						  foreach($numbers as $key => $num){
							  $class = (isset($number["is_duplicate"]) &&  $number["is_duplicate"] == "yes")?"duplicate":"unique";
						  ?>
                            <tr class="<?php echo $class;?>">
                              <td><span class="text-muted"><?php echo ++$key;?></span></td>
                            <td class="number_td"><a href="tel:<?php echo $num["number"];?>"><?php echo $num["number"];?></a><input type="hidden" value="<?php echo $num["number_id"];?>" class="no_id"/><input type="hidden" value="<?php echo $num["id"];?>" class="assign_no_id"/><input type="hidden" value="<?php echo $num["token"];?>" class="token"/></td>
                            <td>
                            	<select name="tsa_status" class="tsa_status form-control custom-select">
                                	<option value="">Please select status</option>
                                	<?php
									foreach($tsa_status as $status){
										echo '<option value="'.$status["id"].'">'.$status["status"].'</option>';
									}
									?>
                                	
                                	<?php /*?><option value"renewed">Renewed</option>
                                    <option value"cancelled">Cancelled</option>
                                    <option value"no answer">No answer</option>
                                    <option value"switch off">Switch off</option>
                                    <option value"no interested">No interested</option>
                                    <option value"interested for renewal">Interested for renewal</option>
                                    <option value"appointment set">Appointment set</option><?php */?>
                                </select>
                            </td>
                            <td><input type="text" class="form-control comment_input" id="comment" name="comment" placeholder="Comment" value=""/></td>
                            <td><a href="" class="update_status_anchor btn btn-primary ml-auto">Submit</a></td>
                            </tr>
                          <?php }?>
                          </tbody>
                         <?php }else{?>
                        <tr><td>No Records Found!</td></tr>
                        <?php }?>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
      </div>
      
      
      
      
<?php /*?><div class="site-wrapper">
	<div class="main-wrappper">       
        <?php
		if(count($numbers) > 0){
		?>
            <div style="width:100%;" id="generated_numbers" class="update_series_wrapper">
            	<h3>Update Status</h3>
                    <table cellspacing="0" cellpadding="0" style="width:100%;">
                    	<th style='width:20%;'>Sr. No.</th>
                        <th style='width:20%;'>Number</th>
                        <th>Update Status</th>
                        
						<?php
                        foreach($numbers as $key => $num){
							$class = (isset($number["is_duplicate"]) &&  $number["is_duplicate"] == "yes")?"duplicate":"unique";
                            ?>
                        <tr class="<?php echo $class;?>">
                            <td style='width:20%;'><?php echo $key + 1;?></td>
                            <td style='width:20%;' class="number_td"><a href="tel:<?php echo $num["number"];?>"><?php echo $num["number"];?></a><input type="hidden" value="<?php echo $num["no_id"];?>" class="no_id"/></td>
                            <td>
                            	<select name="tsa_status" class="tsa_status">
                                	<option value="">Please select status</option>
                                	<option value"renewed">Renewed</option>
                                    <option value"cancelled">Cancelled</option>
                                    <option value"no answer">No answer</option>
                                    <option value"switch off">Switch off</option>
                                    <option value"no interested">No interested</option>
                                    <option value"interested for renewal">Interested for renewal</option>
                                    <option value"appointment set">Appointment set</option>
                                </select>
                            </td>
                        </tr>
                            <?php
                        }
							?>
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
</style><?php */?>

<?php $this->load->view("telesale/templates/modal_lg_form.php"); ?>

<script>
	$(document).ready(function(){
		$(".tsa_status").change(function(){
			if($(this).val() == 7){
				$("#telesale-model input[type='text'],#telesale-model select, #telesale-model textarea, #assigned_numbers_id").val("");
				$("#mobile_no").val($(".number_td a", $(this).closest("tr")).text());
				abc = $(".number_td .no_id", $(this).closest("tr"));
				$("#assigned_numbers_id").val($(".number_td .no_id", $(this).closest("tr")).val());
				$('#telesale-model').modal({
					show: true, 
                    backdrop: 'static',
                    keyboard: false
				});
				//window.open("http://wafiq.projexme.com/telesale/lead-generation/", '_blank',"location=yes,height=570,width=520,scrollbars=yes,status=yes");
			}
		});
		$("#tsa_agent_status").change(function(){
			if($(this).val() == "1"){
				$(".visit_time_wrapper").show();
			}
			else{
				$(".visit_time_wrapper").hide();
			}
		});
		$(".update_status_anchor").click(function(e){
			e.preventDefault();
			var tsa_status = $(".tsa_status", $(this).closest("tr")).val();
			console.log(tsa_status, $(".number_td .tsa_status", $(this).closest("tr")));
			if(tsa_status == ""){
				alert("Please select status.");
				return;
			}
			if(confirm("Do you want to update status?")){
				var currentSelect = $(this);
				var no_id = $(".number_td .no_id", $(this).closest("tr")).val();
				var assign_no_id = $(".number_td .assign_no_id", $(this).closest("tr")).val();
				var comment = $(".comment_input", $(this).closest("tr")).val();
				var token = $(".number_td .token", $(this).closest("tr")).val();
				
				//$(this).closest("tr").remove();
				//console.log(no_id);return;
				$.ajax({
					type: "POST",
					url: "/telesale/update-status",
					data: {
						"id" : no_id,
						"status" : tsa_status,
						"comment" : comment,
						"assign_no_id" : assign_no_id,
						"token" : token
					},
					success: function(msg){
						$(currentSelect).closest("tr").remove();
						console.log(msg);
						
					}
				});
				
			}
		});
		$(document).ajaxStop(function() {});
		
	});
	
</script>
<script>
$(document).ready(function(){
	
	/*$("#date_end, #date_start").datepicker();
	//Daily sale home
	$("#clear_daily_sale").on("click", function(){
		window.location = window.location.origin +  window.location.pathname;
	});*/
	
	$("#package_id").on("change", function(){
		$.ajax({
			url: "/optimize/get-package-detail",
			type: 'POST',
			data: {
				package_id:$(this).val(),
			},
			success: function(response){
				var data = JSON.parse(response);
				var DetailHtml = "<option>Please Select</option>";
				var DetailDescriptionHtml = "";
				$.each(data, function(i, val) {
					DetailHtml += '<option value="'+val['id']+'">';
					DetailHtml += val['package_duration'];
					DetailHtml += '</option>';
					
					DetailDescriptionHtml += '<option value="'+val['package_description']+'">';
					DetailDescriptionHtml += val['package_duration'];
					DetailDescriptionHtml += '</option>';
				});
				$("#package_detail_id").html(DetailHtml);
				$("#package_detail_content").html(DetailDescriptionHtml);
			}
		});
	});
	
	$("#package_detail_id").on("change", function(){
		//console.log($("option[value='"+$(this).val()+"']", $(this)).index(), $(this).val());
		//console.log($("#package_detail_content option:eq("+($("option[value='"+$(this).val()+"']", $(this)).index() - 1))+")").val());
		
		if($(this).val() != ""){
			$("#plan_description").val($("#package_detail_content option:eq("+($("option[value='"+$(this).val()+"']", $(this)).index() - 1)+")").val());
		}
	});
});
</script>
<style>
.visit_time_wrapper{
	display: none;
}
</style>