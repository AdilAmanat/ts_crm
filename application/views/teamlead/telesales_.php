<?php //echo "<pre>"; print_r($dropdowns);/* print_r($numbers);*/ echo "</pre>"; ?>
<div class="page-content">
  <div class="container">
    <div class="row">
        <div class="col-12" id="filter-div">
            <form class="card" id="add_telesale_form" action="">
            	<div class="card-header">
                	<h3>Add Telesale</h3>
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
                                <?php echo form_label('Package', 'package', array('class' => 'form-label'));?>
                                <select name="contact_type" id="city" class="form-control custom-select">
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
								else if(isset($sale["package_detail_id"])){
									$val = $sale["package_detail_id"];
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
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Add On (300+ Package) Name', 'plan_description', array('class' => 'form-label'));?>
                                <input type="text" id="plan_description" class="form-control" readonly value="<?php echo ($selectedDetail != "")?$selectedDetail:"";?>"/>
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
                </div>
                <div class="card-footer text-right">
                  <div class="d-flex">
                    <button type="submit" class="btn btn-primary ml-auto generate_no" id="generate_no">Search</button>
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