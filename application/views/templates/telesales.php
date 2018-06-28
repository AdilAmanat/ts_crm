<?php
$uid = $this->session->userdata('user_id');
$action = "";
$disable = 0;
if($user_type == "tsa"){
	$action = "/teamlead-agent/update-telesale/".$detail["id"]."/";
	$disable = 1;
}
if($user_type == "tl_agent"){
	$action = "/teamlead-agent/update-telesale/".$detail["id"]."/";
	$disable = 2;
}
if($user_type == "tl_csr"){
	$action = "/teamlead-csr/update-telesale/".$detail["id"]."/";
	$disable = 3;
}

if($user_type == "csr"){
	$action = "/csr/update-telesale/".$detail["id"]."/";
	$disable = 4;
}
if($user_type == "backoffice"){
	$action = "/back-office/convert-to-daily-sale/".$detail["id"]."/";
	$disable = 5;
}

$checkHistory = false;
if($uid != $detail["assignee"] || $user_type == "backoffice"){
	$checkHistory = true;
}
//echo "disable:$disable<br>";
?>
<link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>assets/css/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>assets/css/timepicker/timepicker.css">
<div class="row">
        <div class="col-12" id="filter-div">
            <form class="card" id="add_telesale_form" action="<?php echo $action?>" method="post">
            	<div class="card-header">
                	<h3>Lead Generation</h3>
                </div>
                
                <div class="card-body">
                	<div class="card-header">
                        <h4>Personal Information</h4>
                    </div>
                	<div class="row">
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('First Name', 'first_name', array('class' => 'form-label'));?>
                                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" value="<?php echo (isset($detail["first_name"]) && $detail["first_name"] != "")?$detail["first_name"]:"";?>" <?php echo ($disable >= 2)?"disabled readonly":"";?>/>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Last Name', 'last_name', array('class' => 'form-label'));?>
                                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" value="<?php echo (isset($detail["last_name"]) && $detail["last_name"] != "")?$detail["last_name"]:"";?>" <?php echo ($disable >= 2)?"disabled readonly":"";?>/>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Directory Number', 'mobile_no', array('class' => 'form-label'));?>
                                <input type="text" class="form-control" id="mobile_no" name="mobile_no" placeholder="Directory Number" value="<?php echo (isset($detail["mobile_no"]) && $detail["mobile_no"] != "")?$detail["mobile_no"]:"";?>" <?php echo ($disable >= 2)?"disabled readonly":"";?>/>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Alternative Number', 'alternative_no', array('class' => 'form-label'));?>
                                <input type="text" class="form-control" id="alternative_no" name="alternative_no" placeholder="Alternative Number" value="<?php echo (isset($detail["alternative_no"]) && $detail["alternative_no"] != "")?$detail["alternative_no"]:"";?>" <?php echo ($disable >= 2)?"disabled readonly":"";?>/>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Email', 'email', array('class' => 'form-label'));?>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo (isset($detail["email"]) && $detail["email"] != "")?$detail["email"]:"";?>" <?php echo ($disable >= 2)?"disabled readonly":"";?>/>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('City', 'city', array('class' => 'form-label'));?>
                                <select name="city" id="city" class="form-control custom-select" <?php echo ($disable >= 2)?"disabled readonly":"";?>>
                                    <option value="">Please Select</option>
                                    <?php
									foreach($dropdowns['cities'] as $city){
										$sel = "";
										if(isset($detail["city"]) && $detail["city"] == $city["id"]){
											$sel = " selected='selected'";
										}
									?>
									<option value="<?php echo $city["id"]?>"<?php echo $sel;?>><?php echo ucwords($city["city_name"])?></option>
									<?php
									}
									?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Address', 'address', array('class' => 'form-label'));?>
                                <textarea class="form-control" name="address" id="address" rows="6" placeholder="Address" <?php echo ($disable >= 2)?"disabled readonly":"";?>><?php echo (isset($_REQUEST["address"]) && $_REQUEST["address"] != "")?$_REQUEST["address"]:(isset($detail["address"])?$detail["address"]:"");?></textarea>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Extra Remarks', 'extra_remarks', array('class' => 'form-label'));?>
                                <textarea class="form-control" name="extra_remarks" id="extra_remarks" rows="6" placeholder="Extra Remarks" <?php echo ($disable >= 2)?"disabled readonly":"";?>><?php echo (isset($_REQUEST["extra_remarks"]) && $_REQUEST["extra_remarks"] != "")?$_REQUEST["extra_remarks"]:(isset($detail["extra_remarks"])?$detail["extra_remarks"]:"");?></textarea>
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="card-header">
                        <h4>Service Information</h4>
                    </div>
                    <div class="row">
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Package', 'package_id', array('class' => 'form-label'));?>
                                <select name="package_id" id="package_id" class="form-control custom-select" <?php echo ($disable >= 2 || $checkHistory)?"disabled readonly":"";?>>
                                    <option value="">Please Select</option>
                                    <?php
									foreach($dropdowns['packages'] as $package){
										$sel = "";
										if(isset($detail["package_id"]) && $detail["package_id"] == $package["id"]){
											$sel = " selected='selected'";
										}
									?>
									<option value="<?php echo $package["id"];?>"<?php echo $sel;?>><?php echo ucwords($package["package_name"])?></option>
									<?php
									}
									?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                            <?php
								$val = "";
								if(isset($detail)){
										$val = $detail["package_detail_id"];
								}
								$selectedDetail = "";
							?>
                                <?php echo form_label('Contract Duration', 'package_detail_id', array('class' => 'form-label'));?>
                                <select name="package_detail_id" id="package_detail_id" class="form-control custom-select" <?php echo ($disable >= 2 || $checkHistory)?"disabled readonly":"";?>>
                                    <option value="">Please Select</option>
                                    <?php
										$package_detail_content_html = "";
										if(isset($detail["package_selected_detail"])){
											foreach($detail["package_selected_detail"] as $package_selected_detail){
												$package_detail_content_html .= '<option value="'.$package_selected_detail["id"].'">'.$package_selected_detail["package_description"].'</option>';
												if($val != "" && ($package_selected_detail["id"] == $val)){
													$sel = " selected='selected'";
													$selectedDetail = $package_selected_detail["package_description"];
												}
                                                else {
                                                    $sel = " ";
                                                }
												?>
                                                <option value="<?php echo $package_selected_detail["id"];?>"<?php echo $sel;?>><?php echo $package_selected_detail["package_duration"];?></option>
                                                <?php
											}
										}
									?>
                                </select>
                                <select id="package_detail_content" style="display:none;"><?php echo $package_detail_content_html;?></select>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <div class="form-group">
                                <?php echo form_label('Add On (300+ Package) Name', 'plan_description', array('class' => 'form-label'));?>
                                <textarea class="form-control" name="plan_description" id="plan_description" rows="6" readonly <?php echo ($disable >= 2 || $checkHistory)?"disabled readonly":"";?>></textarea>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Promo Device', 'promo_device_id', array('class' => 'form-label'));?>
                                <select name="promo_device_id" id="promo_device_id" class="form-control custom-select" <?php echo ($disable >= 2 || $checkHistory)?"disabled readonly":"";?>>
                                    <option value="">Please Select</option>
                                    <?php
									foreach($dropdowns['promo_devices'] as $promo_device){
										$sel = "";
										if($val != "" && ($promo_device["id"] == $val))
											$sel = " selected='selected'";
									?>
									<option value="<?php echo $promo_device["id"];?>"<?php echo $sel;?>><?php echo ucfirst($promo_device["name"])?></option>
									<?php
									}
									?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                            	<?php
									$val = "";
									if(isset($detail)){
										$val = $detail["handset_type_id"];
									}
									else if(isset($sale["handset_type_id"])){
										$val = $sale["handset_type_id"];
									}
								?>
                                <?php echo form_label('Handset Type', 'handset_type_id', array('class' => 'form-label'));?>
                                <select name="handset_type_id" id="handset_type_id" class="form-control custom-select" <?php echo ($disable >= 2 || $checkHistory)?"disabled readonly":"";?>>
                                    <option value="">Please Select</option>
                                    <?php
									foreach($dropdowns['handset_types'] as $handset_type){
										$sel = "";
										if($val != "" && ($handset_type["id"] == $val))
											$sel = " selected='selected'";
									?>
									<option value="<?php echo $handset_type["id"];?>"<?php echo $sel;?>><?php echo ucwords($handset_type["name"])?></option>
									<?php
									}
									?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
								<?php
                                    $val = "";
                                    if(isset($detail)){
                                        $val = $detail["handset_model_id"];
                                    }
                                    else if(isset($sale["handset_model_id"])){
                                        $val = $sale["handset_model_id"];
                                    }
                                ?>
                                <?php echo form_label('Handset Model', 'handset_model_id', array('class' => 'form-label'));?>
                                <select name="handset_model_id" id="handset_model_id" class="form-control custom-select" <?php echo ($disable >= 2 || $checkHistory)?"disabled readonly":"";?>>
                                    <option value="">Please Select</option>
                                    <?php
									foreach($dropdowns['handset_models'] as $handset_model){
										$sel = "";
										if($val != "" && ($handset_model["id"] == $val))
											$sel = " selected='selected'";
									?>
									<option value="<?php echo $handset_model["id"];?>"<?php echo $sel;?>><?php echo ucwords($handset_model["name"])?></option>
									<?php
									}
									?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php
								$val = "";
								if(isset($detail)){
									$val = $detail["handset_color_id"];
								}
								else if(isset($sale["handset_color_id"])){
									$val = $sale["handset_color_id"];
								}
							?>
                                <?php echo form_label('Handset Color', 'handset_color_id', array('class' => 'form-label'));?>
                                <select name="handset_color_id" id="handset_color_id" class="form-control custom-select" <?php echo ($disable >= 2 || $checkHistory)?"disabled readonly":"";?>>
                                    <option value="">Please Select</option>
                                    <?php
									foreach($dropdowns['handset_colors'] as $handset_color){
										$sel = "";
										if($val != "" && ($handset_color["id"] == $val))
											$sel = " selected='selected'";
									?>
									<option value="<?php echo $handset_color["id"];?>"<?php echo $sel;?>><?php echo ucwords($handset_color["color"])?></option>
									<?php
									}
									?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                            <?php
								$val = "";
								if(isset($detail)){
									$val = $detail["contact_type"];
								}
							?>
                                <?php echo form_label('Lead Classification', 'contact_type', array('class' => 'form-label'));?>
                                <select name="contact_type" id="contact_type" class="form-control custom-select" <?php echo ($disable >= 2 || $checkHistory)?"disabled readonly":"";?>>
                                    <option value="">Please Select</option>
                                    <?php /*
                                    <option value="Fresh" <?php echo ($val == "Fresh")?"selected":"";?>>Fresh</option>
                                    <option value="Online" <?php echo ($val == "Online")?"selected":"";?>>Online</option>
                                    <option value="Digital" <?php echo ($val == "Digital")?"selected":"";?>>Digital</option>
                                    */ ?>
                                    
                                    <?php foreach ($lead_classifications as $key => $value) { ?>
                                        <?php
                                            $selected = ($val == $value['classification']) ? " selected" : "";
                                        ?>
                                        <option value="<?php echo $value['classification']; ?>" <?php echo $selected; ?>><?php echo $value['classification']; ?></option>
                                    <?php } ?>

                                    <?php /*?><?php
									foreach($dropdowns['handset_colors'] as $handset_color){
										$sel = "";
										if($val != "" && ($handset_color["id"] == $val))
											$sel = " selected='selected'";
									?>
									<option value="<?php echo $handset_color["id"];?>"<?php echo $sel;?>><?php echo ucwords($handset_color["color"])?></option>
									<?php
									}
									?><?php */?>
                                </select>
                            </div>
                        </div>
                        <?php /*?><div class="col-md-3 col-lg-3">                              
                            <div class="form-group">
                                <div class="form-label">Call Recording</div>
                                <div class="custom-file">                            
                                  <input type="file" class="custom-file-input" id="avatar_upload" name="tsa_call_recording" >
                                  <input type="hidden" id="call_recording" value = "" name="tsa_call_recording"/>
                                  <label class="custom-file-label">Choose file</label>
                                </div>
                            </div>
                        </div><?php */?>
                        <?php
							$val = "";
							if(isset($detail)){
								$val = $detail["tsa_agent_status"];
							}
						?>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Lead Status', 'tsa_agent_status', array('class' => 'form-label'));?>
                                <select name="tsa_agent_status" id="tsa_agent_status" class="form-control custom-select" <?php echo ($disable >= 2 || $checkHistory)?"disabled readonly":"";?>>
                                    <option value="">Select Status</option>
                                    <?php 
                                    if (isset($dropdowns['telesales_status'])) { 
                                        foreach ($dropdowns['telesales_status'] as $key => $value) { 
                                        $selected = ($value['id'] == $val) ? ' selected' : '';
                                    ?>
                                        <option value="<?php echo $value['id']; ?>" <?php echo $selected; ?>><?php echo $value['status']; ?></option>    
                                    <?php
                                        }
                                    } 
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3 visit_time_wrapper" style=" display:<?php echo (isset($detail["tsa_agent_status"]) && $detail["tsa_agent_status"] == 1)?"block;":"none;";?>">
                            <div class="form-group">
                                <?php echo form_label('Visit Time', 'visit_time', array('class' => 'form-label'));?>
                                <input type="text" class="form-control hasDateTimePicker" id="visit_time" name="visit_time" placeholder="" value="<?php echo (isset($detail["visit_time"]) && $detail["visit_time"] != "")?$detail["visit_time"]:"";?>" <?php echo ($disable >= 2)?"disabled readonly":"";?> autocomplete="off"/>
                            </div>
                        </div>

                        <!-- space filed -->
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <div class="form-label">Special Discount</div>
                                <select name="special_discount" class="form-control custom-select" <?php echo ($disable >= 2)?"disabled readonly":"";?>>
                                    <option value="">Select Discount</option>
                                    <?php foreach ($telesales_discount as $key => $value) { ?>
                                            <option value="<?php echo $value['discount']; ?>" <?php echo (isset($detail["special_discount"]) && $detail["special_discount"] == $value["discount"]) ? " selected" : ""; ?>><?php echo $value['discount']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        
                        <!-- package classification -->
                        <div class="col-md-3 col-lg-3">                              
                            <div class="form-group">
                                <?php echo form_label('Package Classification', 'package_classification_id', array('class' => 'form-label'));?>
                                <select name="package_classification_id" id="package_classification_id" class="form-control custom-select" <?php echo ($disable >= 2)?"disabled readonly":"";?>>
                                    <option value="">Please Select</option>
                                    <?php
                                    foreach($package_classifications as $package_classification){
                                        $sel = "";
                                        echo "$package_classification[id] == $value[package_classification_id])";
                                        if($detail['package_classification_id'] != "" && ($package_classification["id"] == $detail['package_classification_id']))
                                            $sel = " selected='selected'";
                                    ?>
                                    <option value="<?php echo $package_classification["id"];?>"<?php echo $sel;?>><?php echo ucwords($package_classification["classifications_name"]);?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <!-- end package classification -->
                        

                    </div>
                    
                    <div class="row">
                        <?php /*
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <label class="form-label">Call Recording</label>
                                <?php if (isset($detail["tsa_call_recording"]) && !empty($detail["tsa_call_recording"])) { ?>
                                <audio controls>
                                    <source src="<?php echo site_url(); ?>uploads/telesales_call_recording/<?php echo $detail['tsa_call_recording']; ?>">Your browser does not support the audio element.
                                </audio>
                                <?php } ?>
                            </div>
                        </div>
                        */ ?>

                        <?php if (isset($detail["telesales_documents"]) && !empty($detail["telesales_documents"])) { ?>
                            <?php foreach ($detail["telesales_documents"] as $key => $value) { ?>
                            <div class="col-md-3 col-lg-3">
                                <div class="form-group">
                                    <label class="form-label"><?php echo $value['title']; ?></label>
                                    <a href="<?php echo site_url(); ?>uploads/telesales_documents/<?php echo $value['document_file_name']; ?>" target="_blank">
                                        <img src="<?php echo site_url(); ?>uploads/telesales_documents/<?php echo $value['document_file_name']; ?>" class="dse_doc_img enlarge" title="Click to Enlarge" alt="document image">
                                    </a>
                                </div>
                            </div>
                            <?php } ?>
                        <?php } ?>

                    </div>

                    <div class="row">
                        <?php if (isset($detail["mobile_no"]) && !empty($detail["mobile_no"])) { ?>
                            <div class="col-md-3 col-lg-3">
                                <a href="tel:<?php echo $detail["mobile_no"]; ?>" class="btn btn-primary">Call Now</a>
                                <hr>
                            </div>
                        <?php } ?>
                    </div>

                    <?php
					if($disable >= 2 || ($checkHistory && isset($detail["tl_csr"]) && $detail["tl_csr"] != '0')){?>

                    <div class="row">
                        <?php 
                        $show_dropdown = 'display: block;';
                        if (isset($force_vf_status) && $force_vf_status) {
                        $show_dropdown = 'display: none;';
                        ?>
                            <div class="col-md-3 col-lg-3">
                                <div class="card-header">
                                    <h4>Verification Status</h4>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="col-md-3 col-lg-3" id="tl_csr_div" style="<?php echo $show_dropdown; ?>">
                            <div class="card-header">
                                <h4 class="collapse">Team Lead Telesales</h4>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                    	
                        <?php if (isset($force_vf_status) && $force_vf_status) { ?>
                            <div class="col-md-3 col-lg-3">
                                <div class="form-group">
                                    <select name="vf_status" id="vf_status" class="form-control custom-select" required>
                                        <option value="">Select Verification Status</option>
                                        <?php
                                        $vf_statusus_array = array('Verified', 'Not Verified');
                                        foreach($vf_statusus_array as $vf_key => $vf) { ?>
                                            <option value="<?php echo $vf_key;?>"><?php echo $vf;?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="form-group" id="not_vf_reason" style="display: none;">
                                    <select name="vf_status" id="vf_status" class="form-control custom-select">
                                        <option value="">Select Reason</option>
                                        <?php
                                        $not_vf_statusus_array = array('No answer', 'Switch off', 'Interested for renewal', 'No interested', 'Renewed', 'Appointment set');
                                        foreach($not_vf_statusus_array as $nvf) { ?>
                                            <option value="<?php echo $nvf;?>"><?php echo $nvf;?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                            </div>
                        <?php } ?>

                        <div class="col-md-3 col-lg-3" id="tl_csr_dropdown" style="<?php echo $show_dropdown; ?>">
                            <div class="form-group">
                            <?php //echo "<pre>"; print_r($dropdowns["tl_csrs"]); echo "</pre>";
								$val = "";
								if(isset($detail["tl_csr"]))
									$val = $detail["tl_csr"];
							?>
                                <?php // echo form_label('Select Teamlead CSR', 'tsa_agent_status', array('class' => 'form-label'));?>
                                <select name="tl_csr" id="tl_csr" class="form-control custom-select" <?php echo ($disable > 2 || $checkHistory)?"disabled readonly":"";?> required>
                                    <option value="">Select Teamlead CSR</option>
                                    <?php
									foreach($dropdowns["tl_csrs"] as $csr){
									?>
                                    <option value="<?php echo $csr["id"];?>" <?php echo ($val == $csr["id"])?"selected":"";?>><?php echo $csr["first_name"] ." " .$csr["last_name"];?></option>
                                    <?php
									}
									?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <?php }?>
                    <?php
					if($disable >= 3 || ($checkHistory && isset($detail["csr"]) && $detail["csr"] != '0')){?>
                    <div class="card-header">
                        <h4 class="collapse">Team Lead CSR</h4>
                    </div>
                    <div class="row">
                    	<div class="col-md-3 col-lg-3">
                            <div class="form-group">
                            <?php //echo "<pre>"; print_r($dropdowns["tl_csrs"]); echo "</pre>";
								$val = "";
								if(isset($detail["csr"]))
									$val = $detail["csr"];
							?>
                                <?php // echo form_label('Select Teamlead CSR', 'tsa_agent_status', array('class' => 'form-label'));?>
                                <select name="csr" id="csr" class="form-control custom-select" <?php echo ($disable > 3 || $checkHistory)?"disabled readonly":"";?>>
                                    <option value="">Select CSR</option>
                                    <?php
									foreach($dropdowns["csrs"] as $csr){
									?>
                                    <option value="<?php echo $csr["id"];?>" <?php echo ($val == $csr["id"])?"selected":"";?>><?php echo $csr["first_name"] ." " .$csr["last_name"];?></option>
                                    <?php
									}
									?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <?php }?>
                    
                    <?php
					//echo $disable."<br>";
					//echo $detail["csr_status"]."<br>";
					if($disable >= 4 || ($checkHistory && isset($detail["csr_status"]) && $detail["csr_status"] != '0')){?>
                    <div class="card-header">
                        <h4>CSR</h4>
                    </div>
                    <div class="row">
                    	<div class="col-md-3 col-lg-3">
                            <div class="form-group">
                            <?php //echo "<pre>"; print_r($dropdowns["tl_csrs"]); echo "</pre>";
								$val = "";
								if(isset($detail["csr_status"]))
									$val = $detail["csr_status"];
							?>
                                <?php echo form_label('CSR Status', 'csr_status', array('class' => 'form-label'));?>
                                <select name="csr_status" id="csr_status" class="form-control custom-select" <?php echo ($disable > 4 || $checkHistory)?"disabled readonly":"";?> required>
                                    <option value="">Select CSR Status</option>
                                    <?php
									foreach($dropdowns["csr_status"] as $row){
									?>
                                    <option value="<?php echo $row["id"];?>" <?php echo ($val == $row["id"])?"selected":"";?>><?php echo $row["status"];?></option>
                                    <?php
									}
									?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Package', 'csr_package_id', array('class' => 'form-label'));?>
                                <select name="csr_package_id" id="csr_package_id" class="form-control custom-select" <?php echo ($disable > 4 || $checkHistory)?"disabled readonly":"";?>>
                                    <option value="">Please Select</option>
                                    <?php
									foreach($dropdowns['packages'] as $package){
										$sel = "";
										if(isset($detail["package_id"]) && $detail["csr_package_id"] == $package["id"]){
											$sel = " selected='selected'";
										}
									?>
									<option value="<?php echo $package["id"];?>"<?php echo $sel;?>><?php echo ucwords($package["package_name"])?></option>
									<?php
									}
									?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                            <?php
								$val = "";
								if(isset($detail)){
									$val = $detail["csr_package_detail_id"];
								}
								$selectedDetail = "";
							?>
                                <?php echo form_label('Contract Duration', 'csr_package_detail_id', array('class' => 'form-label'));?>
                                <select name="csr_package_detail_id" id="csr_package_detail_id" class="form-control custom-select" <?php echo ($disable > 4 || $checkHistory)?"disabled readonly":"";?>>
                                    <option value="">Please Select</option>
                                    <?php
										$package_detail_content_html = "";
										if(isset($detail["package_selected_detail"])){
											foreach($detail["package_selected_detail"] as $package_selected_detail){
												$package_detail_content_html .= '<option value="'.$package_selected_detail["id"].'">'.$package_selected_detail["package_description"].'</option>';
												if($val != "" && ($package_selected_detail["id"] == $val)){
													$sel = " selected='selected'";
													$selectedDetail = $package_selected_detail["package_description"];
												}
                                                else {
                                                    $sel = " ";
                                                }
												?>
                                                <option value="<?php echo $package_selected_detail["id"];?>"<?php echo $sel;?>><?php echo $package_selected_detail["package_duration"];?></option>
                                                <?php
											}
										}
									?>
                                </select>
                                <select id="csr_package_detail_content" style="display:none;"><?php echo $package_detail_content_html;?></select>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Add On (300+ Package) Name', 'csr_plan_description', array('class' => 'form-label'));?>
                                <textarea class="form-control" name="csr_plan_description" id="csr_plan_description" rows="6" readonly <?php echo ($disable > 4 || $checkHistory)?"disabled":"";?>></textarea>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <div class="form-group">
                                <?php echo form_label('Remarks', 'csr_remarks', array('class' => 'form-label'));?>
                                <textarea class="form-control" name="csr_remarks" id="csr_remarks" rows="6" <?php echo ($disable > 4 || $checkHistory)?"disabled readonly":"";?>><?php echo isset($detail["csr_remarks"])?$detail["csr_remarks"]:"";?></textarea>
                            </div>
                        </div>
                    </div>
                    <?php }?>
                    
                    
                </div>
                <div class="card-footer text-right">
                  <div class="d-flex">
                  	<input type="hidden" value="" name="assigned_numbers_id" id="assigned_numbers_id" />
                    <?php if($disable != 5){?>
                    <button type="submit" <?php echo (isset($force_vf_status) && $force_vf_status) ? ' disabled' : ''; ?> class="btn btn-primary ml-auto generate_no" id="generate_no" <?php echo ($checkHistory)?"disabled":"";?>>Submit</button>
                    <?php }else if($disable == 5){?>
                    <button type="button" <?php echo (isset($force_vf_status) && $force_vf_status) ? ' disabled' : ''; ?> class="btn btn-primary ml-auto convert_to_dsr">Convert to DSR</button>
                    <script>
						$(document).ready(function(){
							$(".convert_to_dsr").click(function(){
								window.location = $("#add_telesale_form").attr("action");
							});
						});
					</script>
                    <?php }?>
                    &nbsp;<a href="#" id="btn-enable-all" class="btn btn-primary">Enable Fields</a>
                  </div>
                </div>                        
            </form>

            <?php if (isset($detail['telesales_logs']) && count($detail['telesales_logs'])) { ?>
                <h2>Telesales Logs</h2>
                <table class="table table-responsive">
                  <thead>
                    <tr>
                      <th>Log Added By</th>
                      <th>Log Added Date</th>
                      <th>Customer Name</th>
                      <th>Directory Number</th>
                      <th>Email</th>
                      <th>Address</th>
                      <!-- <th>Package</th>
                      <th>Contract Duration</th>
                      <th>Promo Device</th>
                      <th>Handset Model</th> -->
                      <th>Lead Classification</th>
                      <!-- <th>Status</th> -->
                      <th>Special Discount</th>
                      <th>TL TS</th>
                      <th>TL CSR</th>
                      <!-- <th>CSR Status</th>
                      <th>CSR Package</th>
                      <th>CSR Contract Duration</th> -->
                  </tr>
              </thead>
              <tbody>

               <?php foreach ($detail['telesales_logs'] as $key => $value) { ?>
               <tr>
                <td><?php echo $detail['all_users'][$value['added_by']]['first_name'] . ' ' . $detail['all_users'][$value['added_by']]['last_name']; ?></td>
                <td><?php echo date('d m Y h:i', strtotime($value['log_date_added'])); ?></td>
                <td><?php echo $value['first_name'] . ' ' . $value['last_name']; ?></td>
                <td><?php echo $value['mobile_no']; ?></td>
                <td><?php echo $value['email']; ?></td>
                <td><?php echo $value['address']; ?></td>
                <td><?php echo $value['contact_type']; ?></td>
                <td><?php echo $value['special_discount']; ?></td>
                <td><?php echo $detail['all_users'][$value['tl_agent']]['first_name'] . ' ' . $detail['all_users'][$value['tl_agent']]['last_name']; ?></td>
                <td><?php echo $detail['all_users'][$value['tl_csr']]['first_name'] . ' ' . $detail['all_users'][$value['tl_csr']]['last_name']; ?></td>
               </tr>
              <?php } ?>
               <tr><td colspan="100"><br></td></tr>
              </tbody>
          </table>
          <?php } ?>

        </div>
    </div>

<script src="//code.jquery.com/ui/1.11.4/jquery-ui.min.js" type="text/javascript"></script>
<script src="<?php echo site_url(); ?>assets/js/timepicker/timepicker.js" type="text/javascript"></script>

<script>
$(document).ready(function(){
	if($("#package_detail_id").val() != ""){
		$("#plan_description").val($("#package_detail_content option[value='"+$("#package_detail_id").val()+"']").text());
	}
	if($("#csr_package_detail_id").val() != ""){
		$("#csr_plan_description").val($("#csr_package_detail_content option[value='"+$("#csr_package_detail_id").val()+"']").text());
	}
	$("#package_id, #csr_package_id").on("change", function(){
		$.ajax({
			url: "/admin/daily-sales/get-package-detail",
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
				if(this.id == "csr_package_id"){
					$("#csr_package_detail_id").html(DetailHtml);
					$("#csr_package_detail_content").html(DetailDescriptionHtml);
				}
				else{
					$("#package_detail_id").html(DetailHtml);
					$("#package_detail_content").html(DetailDescriptionHtml);
				}
				
			}
		});
	});
	
	$("#package_detail_id").on("change", function(){
		if($(this).val() != ""){
			$("#plan_description").val($("#package_detail_content option[value='"+$(this).val()+"']").text());//option:eq("+($("option[value='"+$(this).val()+"']", $(this)).index() - 1)+")").val());
		}
		else{
			$("#plan_description").val("");
		}
	});
	
	$("#csr_package_detail_id").on("change", function(){
		if($(this).val() != ""){
			$("#csr_plan_description").val($("#csr_package_detail_content option[value='"+$(this).val()+"']").text());
		}
		else{
			$("#csr_plan_description").val("");
		}
	});
});
</script>