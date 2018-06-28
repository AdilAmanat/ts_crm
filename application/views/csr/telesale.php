<?php //echo "<pre>"; print_r($dropdowns);/* print_r($numbers);*/ echo "</pre>"; ?>
<div class="page-content">
  <div class="container">
    <div class="row">
        <div class="col-12" id="filter-div">
            <form class="card" id="add_telesale_form" action="">
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
                                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" value="<?php echo (isset($filters["first_name"]) && $filters["first_name"] != "")?$filters["first_name"]:"";?>"/>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Last Name', 'last_name', array('class' => 'form-label'));?>
                                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" value="<?php echo (isset($filters["last_name"]) && $filters["last_name"] != "")?$filters["last_name"]:"";?>"/>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Mobile No', 'mobile_no', array('class' => 'form-label'));?>
                                <input type="text" class="form-control" id="mobile_no" name="mobile_no" placeholder="Mobile No." value="<?php echo (isset($filters["mobile_no"]) && $filters["mobile_no"] != "")?$filters["mobile_no"]:"";?>"/>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Alternative Number', 'alternative_number', array('class' => 'form-label'));?>
                                <input type="text" class="form-control" id="alternative_number" name="alternative_number" placeholder="Alternative Number" value="<?php echo (isset($filters["alternative_number"]) && $filters["alternative_number"] != "")?$filters["alternative_number"]:"";?>"/>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Email', 'email', array('class' => 'form-label'));?>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo (isset($filters["email"]) && $filters["email"] != "")?$filters["email"]:"";?>"/>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('City', 'city', array('class' => 'form-label'));?>
                                <select name="contact_type" id="city" class="form-control custom-select">
                                    <option value="">Please Select</option>
                                    <?php
									foreach($dropdowns['cities'] as $city){
										$sel = "";
										if(isset($filters["city"]) && $filters["city"] == $city["id"]){
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
                                <textarea class="form-control" name="address" id="address" rows="6" placeholder="Address"><?php echo (isset($_REQUEST["address"]) && $_REQUEST["address"] != "")?$_REQUEST["address"]:"";?></textarea>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Extra Remarks', 'extra_remarks', array('class' => 'form-label'));?>
                                <textarea class="form-control" name="extra_remarks" id="extra_remarks" rows="6" placeholder="Extra Remarks"><?php echo (isset($_REQUEST["extra_remarks"]) && $_REQUEST["extra_remarks"] != "")?$_REQUEST["extra_remarks"]:"";?></textarea>
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
                                <select name="package_id" id="package_id" class="form-control custom-select">
                                    <option value="">Please Select</option>
                                    <?php
									foreach($dropdowns['packages'] as $package){
										$sel = "";
										if(isset($filters["package"]) && $filters["package"] == $package["id"]){
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
								if(isset($filters)){
										$val = $filters["package_detail_id"];
								}
								$selectedDetail = "";
							?>
                                <?php echo form_label('Contract Duration', 'package_detail_id', array('class' => 'form-label'));?>
                                <select name="package_detail_id" id="package_detail_id" class="form-control custom-select">
                                    <option value="">Please Select</option>
                                    <?php
										$package_detail_content_html = "";
										if(isset($sale["package_selected_detail"]) && !isset($filter)){
											foreach($sale["package_selected_detail"] as $package_selected_detail){
												$package_detail_content_html .= '<option value="'.$package_selected_detail["id"].'">'.$package_selected_detail["package_description"].'</option>';
												if($val != "" && ($package_selected_detail["id"] == $val)){
													$sel = " selected='selected'";
													$selectedDetail = $package_selected_detail["package_description"];
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
                                <textarea class="form-control" name="extra_remarks" id="plan_description" rows="6" readonly></textarea>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Promo Device', 'promo_device_id', array('class' => 'form-label'));?>
                                <select name="promo_device_id" id="promo_device_id" class="form-control custom-select">
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
									if(isset($filters)){
										$val = $filters["handset_type_id"];
									}
									else if(isset($sale["handset_type_id"])){
										$val = $sale["handset_type_id"];
									}
								?>
                                <?php echo form_label('Handset Type', 'handset_type_id', array('class' => 'form-label'));?>
                                <select name="handset_type_id" id="handset_type_id" class="form-control custom-select">
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
                                    if(isset($filters)){
                                        $val = $filters["handset_model_id"];
                                    }
                                    else if(isset($sale["handset_model_id"])){
                                        $val = $sale["handset_model_id"];
                                    }
                                ?>
                                <?php echo form_label('Handset Model', 'handset_model_id', array('class' => 'form-label'));?>
                                <select name="handset_model_id" id="handset_model_id" class="form-control custom-select">
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
								if(isset($filters)){
									$val = $filters["handset_color_id"];
								}
								else if(isset($sale["handset_color_id"])){
									$val = $sale["handset_color_id"];
								}
							?>
                                <?php echo form_label('Handset Color', 'handset_color_id', array('class' => 'form-label'));?>
                                <select name="handset_color_id" id="handset_color_id" class="form-control custom-select">
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
                                <?php echo form_label('Contact Type', 'contact_type', array('class' => 'form-label'));?>
                                <select name="contact_type" id="contact_type" class="form-control custom-select">
                                    <option value="">Please Select</option>
                                    <option value="Fresh">Fresh</option>
                                    <option value="Online" selected="selected">Online</option>
                                    <option value="Digital">Digital</option>
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
                        <div class="col-md-3 col-lg-3">                              
                            <div class="form-group">
                                <div class="form-label">Call Recording</div>
                                <div class="custom-file">                            
                                  <input type="file" class="custom-file-input" id="avatar_upload" name="avatar_upload" >
                                  <input type="hidden" id="call_recording" value = "" name="call_recording"/>
                                  <label class="custom-file-label">Choose file</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Status', 'status', array('class' => 'form-label'));?>
                                <select name="status" id="status" class="form-control custom-select">
                                    <option value="">Select Status</option>
                                    <option value="1" selected="selected">Appointment Set</option>
                                    <option value="2">Not Interested</option>
                                    <option value="3">Not Answer</option>
                                    <option value="4">Not Eligible</option>
                                    <option value="5">Not Defined</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Visit Time', 'visit_time', array('class' => 'form-label'));?>
                                <input type="text" class="form-control" id="visit_time" name="visit_time" placeholder="" value="<?php echo (isset($filters["visit_time"]) && $filters["visit_time"] != "")?$filters["visit_time"]:"";?>"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                  <div class="d-flex">
                    <button type="submit" class="btn btn-primary ml-auto generate_no" id="generate_no">Submit</button>
                  </div>
                </div>                        
            </form>
        </div>
    </div>
<script>
$(document).ready(function(){
	
	/*$("#date_end, #date_start").datepicker();
	//Daily sale home
	$("#clear_daily_sale").on("click", function(){
		window.location = window.location.origin +  window.location.pathname;
	});*/
	
	$("#package_id").on("change", function(){
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
<style>.ui-datepicker-close.ui-state-default.ui-priority-primary.ui-corner-all.clear_this_date{left:0;margin:.5em auto .4em;position:absolute;right:0;text-align:center;width:100%;max-width:80px;color:#999;border:1px solid #999;font-weight:normal;}</style>