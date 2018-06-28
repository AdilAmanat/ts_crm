<div class="page-content">
  <div class="container">
    <div class="row">
        <div class="col-12" id="filter-div">
            <form class="card" id="generate_numbers_form" action="/teamlead/">
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
                                <?php echo form_label('Emirates ID', 'emirates_id', array('class' => 'form-label'));?>
                                <input type="text" id="emirates_id" name="emirates_id" placeholder="Emirates ID" value="<?php echo (isset($filters["emirates_id"]) && $filters["emirates_id"] != "")?$filters["emirates_id"]:"";?>" class="form-control"/>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Package Rate Plan', 'package_rate_plan', array('class' => 'form-label'));?>
                                <select name="package_rate_plan" id="package_rate_plan" class="form-control custom-select">
                                    <option value="">Please Select</option>
                                    <?php
									foreach($dropdowns['package_rate_plans'] as $package_rate_plan){
										$sel = "";
										if(isset($filters["package_rate_plan"]) && $filters["package_rate_plan"] == $package_rate_plan){
											$sel = " selected='selected'";
										}
									?>
									<option value="<?php echo $package_rate_plan?>"<?php echo $sel;?>><?php echo strtoupper($package_rate_plan)?></option>
									<?php
									}
									?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Package Classification', 'package_classification', array('class' => 'form-label'));?>
                                <select name="package_classification" id="package_classification" class="form-control custom-select">
                                    <option value="">Please Select</option>
                                    <?php
									foreach($dropdowns['package_classifications'] as $package_classification){
										$sel = "";
										if(isset($filters["package_classification"]) && $filters["package_classification"] == $package_classification){
											$sel = " selected='selected'";
										}
									?>
									<option value="<?php echo $package_classification?>"<?php echo $sel;?>><?php echo strtoupper($package_classification)?></option>
									<?php
									}
									?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Contract Tenure', 'contract_tenure', array('class' => 'form-label'));?>
                                <select name="contract_tenure" id="contract_tenure" class="form-control custom-select">
                                    <option value="">Please Select</option>
                                    <?php
									foreach($dropdowns['contract_tenures'] as $contract_tenure){
										$sel = "";
										if(isset($filters["contract_tenure"]) && $filters["contract_tenure"] == $contract_tenure){
											$sel = " selected='selected'";
										}
									?>
									<option value="<?php echo $contract_tenure?>"<?php echo $sel;?>><?php echo strtoupper($contract_tenure)?></option>
									<?php
									}
									?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Activation Date From', 'activation_date_from', array('class' => 'form-label'));?>
                               <input type="text" id="activation_date_from" name="activation_date_from" placeholder="Activation Date From" value="<?php echo (isset($filters["activation_date_from"]) && $filters["activation_date_from"] != "")?$filters["activation_date_from"]:"";?>"/ class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Activation Date Till', 'activation_date_till', array('class' => 'form-label'));?>
                               <input type="text" id="activation_date_till" name="activation_date_till" placeholder="Activation Date Till" value="<?php echo (isset($filters["activation_date_till"]) && $filters["activation_date_till"] != "")?$filters["activation_date_till"]:"";?>"/ class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('CSR Status', 'csr_status', array('class' => 'form-label'));?>
                                <select name="csr_status" id="csr_status" class="form-control custom-select">
                                    <option value="">Please Select</option>
                                    <?php
									$select = "";
									foreach($dropdowns['csr_status'] as $status){
										$sel = "";
										if(isset($filters["csr_status"]) && $filters["csr_status"] == $status["id"]){
											$sel = " selected='selected'";
										}
										echo '<option value="'.$status['id'].'" '.$sel.'>'.$status['status'].'</option>';
									}
									?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('TSA Status', 'call_status', array('class' => 'form-label'));?>
                                <select name="call_status" id="call_status" class="form-control custom-select">
                                    <option value="">Please Select</option>
                                    <?php
									$select = "";
									foreach($dropdowns['csr_status'] as $status){
										$sel = "";
										if(isset($filters["csr_status"]) && $filters["csr_status"] == $status["id"]){
											$sel = " selected='selected'";
										}
										echo '<option value="'.$status['id'].'" '.$sel.'>'.$status['status'].'</option>';
									}
									?>
                                </select>
                            </div>
                        </div>
                        
                        
                        
                        
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Total Numbers', 'total_no', array('class' => 'form-label'));?>
                                <input type="text" id="total_no" name="total_no" placeholder="Total Numbers" value="<?php echo (isset($filters["total_no"]) && $filters["total_no"] != "")?$filters["total_no"]:"";?>"/ class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                  <div class="d-flex">
                    <button type="submit" class="btn btn-primary ml-auto generate_no" id="generate_no">Search</button>
                  </div>
                </div>                        
            </form>
        </div>
    </div>
    
    <?php
		//echo "<pre>"; print_r($series); echo "</pre>";
		if(isset($series) && count($series) > 0){
		?>
    <div class="row row-cards row-deck">
                    <div class="col-12">
                    <div class="card" id="generated_numbers">
                      <div class="card-header">
                        <h3>Ready to Assign</h3>
                      </div>
                      <div class="table-responsive">
                        <table class="table card-table table-vcenter text-nowrap">
                        <?php if(count($series) > 0 ){?>
                          <thead>
                            <tr>
                              <th class="w-1">No.</th>
                              <th>Total Numbers</th>                        
                                <th>Start Number</th>
                                <th>End Number</th>
                                <th>Date Added</th>
                                <th>Update</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php
						  foreach($series as $key => $num){?>
                            <tr>
                              <td><span class="text-muted"><?php echo ++$key;?></span></td>
                              <td><?php echo $num["total_numbers"];?></td>
                              <td>0<?php echo $num["start_number"];?></td>
                              <td>0<?php echo $num["end_number"];?></td>
                              <td><?php echo date("d F, Y", strtotime($num["date_added"]));?></td>
                              <td><a href="/teamlead/assign-numbers-without-feedback/<?php echo $num["export_token"];?>">View</a></td>
                            </tr>
                          <?php }?>
                          </tbody>
                         <?php }else{?>
                        <tr><td colspan="8">No Records Found!</td></tr>
                        <?php }?>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
    <?php
		}
		?>
        
        
        
        
        <?php /*?><?php
		//echo "<pre>"; print_r($series); echo "</pre>";
		if(isset($series_with_feedbacks) && count($series_with_feedbacks) > 0){
		?>
    <div class="row row-cards row-deck">
                    <div class="col-12">
                    <div class="card" id="generated_numbers">
                      <div class="card-header">
                        <h3>Series - With Feedback(s)</h3>
                      </div>
                      <div class="table-responsive">
                        <table class="table card-table table-vcenter text-nowrap">
                        <?php if(count($series_with_feedbacks) > 0 ){?>
                          <thead>
                            <tr>
                              <th class="w-1">No.</th>
                              <th>Total Numbers</th>                        
                                <th>Start Number</th>
                                <th>End Number</th>
                                <th>Date Added</th>
                                <th>Update</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php
						  foreach($series_with_feedbacks as $key => $num){?>
                            <tr>
                              <td><span class="text-muted"><?php echo ++$key;?></span></td>
                              <td><?php echo $num["total_numbers"];?></td>
                              <td>0<?php echo $num["start_number"];?></td>
                              <td>0<?php echo $num["end_number"];?></td>
                              <td><?php echo date("d F, Y", strtotime($num["date_added"]));?></td>
                              <td><a href="/teamlead/assign-numbers-without-feedback/<?php echo $num["export_token"];?>">View</a></td>
                            </tr>
                          <?php }?>
                          </tbody>
                         <?php }else{?>
                        <tr><td colspan="8">No Records Found!</td></tr>
                        <?php }?>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
    <?php
		}
		?><?php */?>
        
        
        <?php if(isset($numbers) && count($numbers)){?>
        	<div class="row row-cards  row-deck">
                <div class="col-12">
                <div class="card" id="generated_numbers">
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
                                <div class="col-md-3 col-lg-3">
                                    <div class="form-group">
                                        <?php echo form_label('Select CSR', 'csr_member', array('class' => 'form-label'));?>
                                        <select name="csr_member" id="csr_member" class="form-control custom-select">
                                            <option value="">Please Select</option>
                                            <?php
                                                foreach($csrs as $csr){
                                                    ?>
                                                    <option value="<?php echo $csr["id"]?>"><?php echo $csr["first_name"] . " " .$csr["last_name"];?></option>
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
                                
                                <div class="col-md-3 col-lg-3">
                                    <div class="form-group">
                                        <?php echo form_label('Select All', 'select_all', array('class' => 'form-label'));?>
                                        <input type="checkbox" id="select-all" name="select_all" placeholder="Select All" value=""/>
                                    </div>
                                </div>
                                <div class="col-md-3 col-lg-3">
                                    <div class="form-group">
                                        <?php echo form_label('Unselect All', 'unselect_all', array('class' => 'form-label'));?>
                                        <input type="checkbox" id="unselect-all" name="unselect_all" placeholder="Unselect All" value=""/>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        </div>
                </div>
        	</div>
            
            <div class="row row-cards row-deck">
                    <div class="col-12">
                    <div class="card">
                      <div class="table-responsive">
                        <table class="table card-table table-vcenter text-nowrap">
                        <?php if(count($numbers) > 0 ){?>
                          <thead>
                            <tr>
                              <th class="w-1">No.</th>
                              <th>Number</th>
                              <th>Emirates ID</th>
                              <th>Assign</th>
                            </tr>
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
								//$status = ($number["back_office_status"] == "1")?"Valid":"Invalid";
								//echo "<td>".$status."</td>";
								?>
                                <td><input type="checkbox" name="assign_number_check[]" class="assign_number_check" number_id="<?php echo $number["no_id"]?>"/></td>
                                <?php
							echo "</tr>";
                        }
                        ?>
                        
                        
                          <?php
						  $counter = 1;
						  foreach($numbers as $key => $number){
						  $class = (isset($number["is_duplicate"]) &&  $number["is_duplicate"] == "yes")?"duplicate":"unique";
						  ?>
                            <tr class="<?php echo $class;?>">
                              <td><span class="text-muted"><?php echo ++$key;?></span></td>
                              <td><?php echo $number['number'];?></td>
                              <?php $emirate_id = ($number["emirate_id"] == "")?"-":$number["emirate_id"]; ?>
                              <td><?php echo $emirate_id;?></td>
                              <td><input type="checkbox" name="assign_number_check[]" class="assign_number_check" number_id="<?php echo $number["no_id"]?>"/></td>
                            </tr>
                          <?php }?>
                          </tbody>
                         <?php }else{?>
                        <tr><td colspan="8">No Records Found!</td></tr>
                        <?php }?>
                        </table>
                      </div>
                      <div class="card-footer text-right">
                          <div class="d-flex">
                            <button type="button" class="btn btn-primary ml-auto" id="assign_numbers">Assign</button>
                          </div>
                        </div>
                    </div>
                    
                  </div>
                </div>
            
        <?php }?>

















<?php /*?><div class="site-wrapper">
	<div class="main-wrappper">
    	<div style="width:100%;" id="filter-div">
        <form id="generate_numbers_form" action="/teamlead/">
        	<table cellspacing="0" cellpadding="0">
            	
                    <tr>
                        <td><label for="series_start">Series Start</label><br/><input type="text" id="series_start" name="series_start" placeholder="Series start" value="<?php echo (isset($filters["series_start"]) && $filters["series_start"] != "")?$filters["series_start"]:"";?>"/></td>
                        <td><label for="series_end">Series End</label><br/><input type="text" id="series_end" name="series_end" placeholder="Series end" value="<?php echo (isset($filters["series_end"]) && $filters["series_end"] != "")?$filters["series_end"]:"";?>"/></td>
                        <td><label for="series_end">Emirates ID</label><br/><input type="text" id="emirates_id" name="emirates_id" placeholder="Emirates ID" value="<?php echo (isset($filters["emirates_id"]) && $filters["emirates_id"] != "")?$filters["emirates_id"]:"";?>"/></td>
                        <td>
                            <label for="package_rate_plan">Package Rate Plan</label><br/>
                            <select name="package_rate_plan" id="package_rate_plan">
                                <option value="">Please Select</option>
                                <?php
								foreach($dropdowns['package_rate_plans'] as $package_rate_plan){
									$sel = "";
									if(isset($filters["package_rate_plan"]) && $filters["package_rate_plan"] == $package_rate_plan){
										$sel = " selected='selected'";
									}
								?>
                                <option value="<?php echo $package_rate_plan?>"<?php echo $sel;?>><?php echo strtoupper($package_rate_plan)?></option>
                                <?php
								}
								?>
                            </select>
                        </td>
                        
                       
                    </tr>
                    <tr>
                    	<td>
                            <label for="package_classification">Package Classification</label><br/>
                            <select name="package_classification" id="package_classification">
                                <option value="">Please Select</option>
                                <?php
								foreach($dropdowns['package_classifications'] as $package_classification){
									$sel = "";
									if(isset($filters["package_classification"]) && $filters["package_classification"] == $package_classification){
										$sel = " selected='selected'";
									}
								?>
                                <option value="<?php echo $package_classification?>"<?php echo $sel;?>><?php echo strtoupper($package_classification)?></option>
                                <?php
								}
								?>
                            </select>
                        </td>
                        <td>
                            <label for="contract_tenure">Contract Tenure</label><br/>
                            <select name="contract_tenure" id="contract_tenure">
                                <option value="">Please Select</option>
                                <?php
								foreach($dropdowns['contract_tenures'] as $contract_tenure){
									$sel = "";
									if(isset($filters["contract_tenure"]) && $filters["contract_tenure"] == $contract_tenure){
										$sel = " selected='selected'";
									}
								?>
                                <option value="<?php echo $contract_tenure?>"<?php echo $sel;?>><?php echo strtoupper($contract_tenure)?></option>
                                <?php
								}
								?>
                            </select>
                        </td>
                         <td><label for="activation_date_from">Activation Date From</label><br/><input type="text" id="activation_date_from" name="activation_date_from" placeholder="Activation Date From" value="<?php echo (isset($filters["activation_date_from"]) && $filters["activation_date_from"] != "")?$filters["activation_date_from"]:"";?>"/></td>
                        <td><label for="activation_date_till">Activation Date Till</label><br/><input type="text" id="activation_date_till" name="activation_date_till" placeholder="Activation Date Till" value="<?php echo (isset($filters["activation_date_till"]) && $filters["activation_date_till"] != "")?$filters["activation_date_till"]:"";?>"/></td>
                    </tr>
                    <tr>
                    <td>
                            <label for="csr_status">CSR Status</label><br/>
                            <select name="csr_status" id="csr_status">
                                <option value="">Please Select</option>
                                <?php
								$select = "";
								foreach($dropdowns['csr_status'] as $status){
									$sel = "";
									if(isset($filters["csr_status"]) && $filters["csr_status"] == $status["id"]){
										$sel = " selected='selected'";
									}
									echo '<option value="'.$status['id'].'" '.$sel.'>'.$status['status'].'</option>';
								}
								?>
                            </select>
                        </td>
                    <td>
                            <label for="call_status">TSA Status</label><br/>
                            <select name="call_status" id="call_status">
                                <option value="">Please Select</option>
                                <?php
								foreach($dropdowns['call_status'] as $call_status){
									$sel = "";
									if(isset($filters["call_status"]) && $filters["call_status"] == $call_status){
										$sel = " selected='selected'";
									}
								?>
                                <option value="<?php echo $call_status?>"<?php echo $sel;?>><?php echo strtoupper($call_status)?></option>
                                <?php
								}
								?>
                            </select>
                        </td>
                    	 <td><label for="total_no">Total Numbers</label><br/><input type="number" id="total_no" name="total_no" placeholder="Total Numbers" min="0" oninput="this.value = Math.abs(this.value)" value="<?php echo (isset($filters["total_no"]) && $filters["total_no"] != "")?$filters["total_no"]:"";?>"/></td>
                        <td colspan="3"><input type="submit" id="generate_no" value="Generate"/></td>
                    </tr>
                
            </table>
           </form>
        </div>
        
        <?php
		//echo "<pre>"; print_r($series); echo "</pre>";
		if(isset($series) && count($series) > 0){
		?>
            <div style="width:100%;margin-top:50px;" id="generated_numbers">
            	<h3>Available Series - New</h3>
                    <table cellspacing="0" cellpadding="0" style="width:100%;">
                    	<th style='width:20%;'>Sr. No.</th>
                        <th>Total Numbers</th>                        
                        <th>Start Number</th>
                        <th>End Number</th>
                        <th>Date Added</th>
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
                            <td><a href="/teamlead/assign-numbers-without-feedback/<?php echo $num["export_token"];?>" class="update-btn">View</a></td>
                        </tr>
                            <?php
                        }
							?>
                        
                    </table>
                </div>
        <?php
		}
		?>
        
         <?php
		//echo "<pre>"; print_r($series); echo "</pre>";
		if(isset($series_with_feedbacks) && count($series_with_feedbacks) > 0){
		?>
            <div style="width:100%;margin-top:50px;" id="generated_numbers">
            	<h3>Available Series - With Feedback(s)</h3>
                    <table cellspacing="0" cellpadding="0" style="width:100%;">
                    	<th style='width:20%;'>Sr. No.</th>
                        <th>Total Numbers</th>                        
                        <th>Start Number</th>
                        <th>End Number</th>
                        <th>Date Added</th>
                        <th>Update</th>
                        
						<?php
                        foreach($series_with_feedbacks as $key => $num){
                            ?>
                        <tr>
                            <td style='width:20%;'><?php echo $key + 1;?></td>
                            <td style='width:20%;'><?php echo $num["total_numbers"];?></td>
                            <td style='width:20%;'>0<?php echo $num["start_number"];?></td>
                            <td style='width:20%;'>0<?php echo $num["end_number"];?></td>                            
                            <td><?php echo date("d F, Y", strtotime($num["date_added"]));?></td>
                            <td><a href="/teamlead/assign-numbers-with-feedback/<?php echo $num["export_token"];?>" class="update-btn">View</a></td>
                        </tr>
                            <?php
                        }
							?>
                        
                    </table>
                </div>
        <?php
		}
		?>
        
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
                </select> Select CSR: <select name="csr_member" id="csr_member">
                    <option value="">Please Select</option>
                    <?php
						foreach($csrs as $csr){
							?>
                           <option value="<?php echo $csr["id"]?>"><?php echo $csr["first_name"] . " " .$csr["last_name"];?></option>
                            <?php
						}
					?>
                </select> Assign to each team member: <input type="text" id="no_count_for_tsa" value="" placeholdes="numbers to each TSA"/><br/>Select All: <input type="checkbox" id="select-all" /> Unselect All: <input type="checkbox" id="unselect-all" /> <br/><br/>
                <table cellspacing="0" cellpadding="0">
                	<thead>
                        <th style='width:20%;'>Sr. No.</th>
                        <th style='width:20%;'>Number</th>
                        <th>Emirates ID</th>
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
			if($("input[name='assign_number_check[]']:checked").length == 0){
				alert("Please select at least one number to assign.");
				return;
			}
			if($("#csr_member").val() == "" && $("#team_member").val() == ""){
				alert("Please select team member or CSR to assign numbers");
				return;
			}
			var tsa_id = "";
			if($("#csr_member").val() != "" ){
				tsa_id = $("#csr_member").val();
			}
			else if($("#assign_numbers").val() == "" && $("#team_member").val() == ""){
				alert("Please select any one option to assign numbers.\n Either select agenet or enter total count to assign each TSA.");
				return;
			}
			else{
				tsa_id = $("#team_member").val();
			}
			if($("#assign_numbers").val() != ""){
				var TableData = [];
				var iteration = 0;
				$("input[name='assign_number_check[]']:checked").each(function(){
					TableData[iteration] = {
						"id" : $(this).attr("number_id"),
						"tsa_id" :  tsa_id
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
					url: "/teamlead/assign_numbers_to_individual",
					data: "pTableData=" + TableData1,
					success:function(){}
				});
			}
			
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
				$(this).closest("tr").remove();
			});
			
			//console.log("all ajax complete");
			//return;
			//window.location = "/generate/save-series/?token="+token+"&status=completed";
			
			//$("#filter-div-bottom, #generated_numbers").remove();
			alert("Numbers saved successfully.");
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
			var call_status = $.trim($("#call_status").val());
			var csr_status = $.trim($("#csr_status").val());
			
			//var sequence     = $.trim($("#sequence").val());
			
			/*if(series_start == "" && series_end == "" && total_no == "" && emirates_id == ""){
				error_msg = "Please select option to generate.\n";
				error_count++;
			}*/
			
			if(series_start == "" && series_end != "" && total_no == "" && emirates_id == "" && package_rate_plan == "" && package_classification == "" && contract_tenure == "" && call_status == "" && csr_status == ""){
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
			window.location = "/teamlead_agent/assign-leads?"+$("#generate_numbers_form").serialize();
		
		return false;
			
		});
		
		$("#activation_date_from, #activation_date_till").datepicker();
	});
	
</script>
<style>.ui-datepicker-close.ui-state-default.ui-priority-primary.ui-corner-all.clear_this_date{left:0;margin:.5em auto .4em;position:absolute;right:0;text-align:center;width:100%;max-width:80px;color:#999;border:1px solid #999;font-weight:normal;}</style>