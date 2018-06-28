<?php //echo "<pre>"; print_r($filters); print_r($numbers); echo "</pre>"; ?>
<div class="page">
      <div class="page-main">
          <div class="page-content">
              <div class="container">
                <div class="row">
                <?php
				foreach($detail as $row){
				?>
                	<div class="col-md-12 col-xl-12">
                    <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">Date Activity: <?php echo date("d F, Y, H:i A", strtotime($row["date_assigned"]));?></h3>
                      </div>
                      <div class="card-body">
                        <strong>Assigned By:</strong> <?php echo $row["assigned_by_first_name"] ." ". $row["assigned_by_first_name"];?><br />
                        <strong>Assigned To:</strong> <?php echo $row["assignee_first_name"] ." ". $row["assignee_last_name"];?><br />
                        <?php if($row["status_name"] != ""){?>
                        <strong>Status:</strong> <?php echo $row["status_name"];?><br />
                        <?php }?>
                        <?php if($row["comment"] != ""){?>
                        <strong>Comment:</strong> <?php echo $row["comment"];?><br />
                        <?php }?>
                      </div>
                    </div>
                  </div>
                <?php
				}?>

                </div>
                
                <div class="row">
                	
                    <div class="col-md-12 col-xl-12">
                        <div class="card">
                          <div class="card-header">
                            <h3 class="card-title">Update Status</h3>
                          </div>
                          <div class="card-body">
                           	<div class="row">
                            <div class="col-md-3 col-lg-3">
                                <div class="form-group">
                                    <?php echo form_label('Comment', 'comment', array('class' => 'form-label'));?>
                                    <input type="text" id="comment" name="comment" class="form-control" placeholder="Comment" value="<?php echo (isset($filters["comment"]) && $filters["comment"] != "")?$filters["comment"]:"";?>"/>
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-3">
                                <div class="form-group">
                                    <button type="button" class="btn btn-primary ml-auto assign_back">Assign Back</button>
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Assign to New Agent', 'team_members', array('class' => 'form-label'));?>
                                <select name="team_members" id="team_members" class="form-control custom-select">
                                    <option value="">Please Select</option>
                                    <?php
									foreach($team_members as $team_member){
										$sel = "";
										if(isset($filters["team_members"]) && $filters["team_members"] == $team_member["id"]){
											$sel = " selected='selected'";
										}
									?>
									<option value="<?php echo $team_member["id"];?>"<?php echo $sel;?>><?php echo ucwords($team_member["first_name"] . " " .$team_member["last_name"]);?></option>
									<?php
									}
									?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Assign to TL CSR', 'tl_csr', array('class' => 'form-label'));?>
                                <select name="tl_csr" id="tl_csr" class="form-control custom-select">
                                    <option value="">Please Select</option>
                                    <?php
									foreach($csrs as $csr){
										$sel = "";
										if(isset($filters["tl_csr"]) && $filters["tl_csr"] == $csr["id"]){
											$sel = " selected='selected'";
										}
									?>
									<option value="<?php echo $csr["id"];?>"<?php echo $sel;?>><?php echo ucwords($csr["first_name"] . " " .$csr["last_name"]);?></option>
									<?php
									}
									?>
                                </select>
                            </div>
                        </div>
                            </div>
                            
                            
                            
                          </div>
                        </div>
                      </div>
                    
                    
                </div>
              </div>
          </div>
      </div>
<script>
<?php if(isset($detail) && count($detail) > 0){?>
var number_id = '<?php echo $detail[count($detail) - 1]["id"]?>';
var assign_to = '<?php echo $detail[count($detail) - 1]["assigned_by"]?>';
<?php }?>
$(document).ready(function(){
	$(".assign_back").click(function(){
		if($.trim($("#comment").val()) == ""){
			//$("#error").html("Please enter comment.");
			alert("Please enter comment.");
			
		}
		else{
			$.ajax({
				type: "POST",
				url: "/teamlead_agent/assign-number",
				data: {
					"id" : number_id,
					"assign_to" : assign_to,
					"comment" : $.trim($("#comment").val())
				},
				success: function(msg){
					alert("Status Updated");
					window.location = "/teamlead-agent/tsa-update/";
					
				}
			});
		}
	});
	
	$("#team_members, #tl_csr").change(function(){
		if($(this).val() != ""){
			if($.trim($("#comment").val()) == ""){
				$(this).val("");
				alert("Please enter comment.");
			}
			else{
				$.ajax({
					type: "POST",
					url: "/teamlead_agent/assign-number",
					data: {
						"id" : number_id,
						"assign_to" : $(this).val(),
						"comment" : $.trim($("#comment").val())
					},
					success: function(msg){
						alert("Status Updated");
						window.location = "/teamlead-agent/tsa-update/";
						
					}
				});
			}
		}
	});
});

</script>
<style>
	.assign_back{margin-top: 10%;margin-left: 26% !important;}
</style>