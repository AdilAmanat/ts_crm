<?php //echo "<pre>"; print_r($numbers); echo "</pre>";//exit;?>
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
                              <th>Update</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php
						  foreach($numbers as $key => $num){
						  ?>
                            <tr>
                              <td><span class="text-muted"><?php echo ++$key;?></span></td>
                            <td class="number_td"><a href="tel:<?php echo $num["number"];?>"><?php echo $num["number"];?></a><input type="hidden" value="<?php echo $num["number_id"];?>" class="no_id"/><input type="hidden" value="<?php echo $num["id"];?>" class="assign_no_id"/><input type="hidden" value="<?php echo $num["token"];?>" class="token"/></td>
                            <td>
                            	<select name="csr_status" class="csr_status form-control custom-select">
                                	<option value="">Please select status</option>
                                	<?php
									foreach($csr_status as $status){
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
                            <td><a href="" class="update_status_anchor"><i class="fe fe-file-plus" data-toggle="tooltip" title="" data-original-title="fe fe-file-plus"></i></a></td>
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
                            	<select name="csr_status" class="csr_status">
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

<!-- Modal -->
<script>
	$(document).ready(function(){
		$(".update_status_anchor").click(function(e){
			e.preventDefault();
			var csr_status = $(".csr_status", $(this).closest("tr")).val();
			console.log(csr_status, $(".number_td .csr_status", $(this).closest("tr")));
			if(csr_status == ""){
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
					url: "/csr/update-status",
					data: {
						"id" : no_id,
						"status" : csr_status,
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
	});
</script>