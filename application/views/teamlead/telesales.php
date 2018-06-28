<div class="page-content">
  <div class="container">
    <div class="row">
        <div class="col-12" id="filter-div">
            <form class="card" id="generate_numbers_form" action="">
                <div class="card-header">
                	<h3>Manage Leads</h3>
                </div>
                <div class="card-body">
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
                                <?php echo form_label('Contact Type', 'contact_type', array('class' => 'form-label'));?>
                                <select name="contact_type" id="contact_type" class="form-control custom-select">
                                    <option value="">Please Select</option>
                                    <option value="fresh">Fresh</option>
                                    <option value="online">Online</option>
                                    <option value="digital">Digital</option>
                                    <?php /*?><?php
									foreach($dropdowns['package_rate_plans'] as $package_rate_plan){
										$sel = "";
										if(isset($filters["package_rate_plan"]) && $filters["package_rate_plan"] == $package_rate_plan){
											$sel = " selected='selected'";
										}
									?>
									<option value="<?php echo $package_rate_plan?>"<?php echo $sel;?>><?php echo strtoupper($package_rate_plan)?></option>
									<?php
									}
									?><?php */?>
                                </select>
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
                                <?php echo form_label('Status', 'status', array('class' => 'form-label'));?>
                                <select name="status" id="status" class="form-control custom-select">
                                    <option value="">Please Select</option>
                                    <option value="1">Appointment Set</option>
                                    <option value="2">Not Interested</option>
                                    <option value="3">Not Answer</option>
                                    <option value="4">Not Eligible</option>
                                    <option value="5">Not Defined</option>
                                    <?php /*?><?php
									foreach($dropdowns['contract_tenures'] as $contract_tenure){
										$sel = "";
										if(isset($filters["contract_tenure"]) && $filters["contract_tenure"] == $contract_tenure){
											$sel = " selected='selected'";
										}
									?>
									<option value="<?php echo $contract_tenure?>"<?php echo $sel;?>><?php echo strtoupper($contract_tenure)?></option>
									<?php
									}
									?><?php */?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Leads Assign', 'tsa', array('class' => 'form-label'));?>
                               <select name="tsa" id="tsa" class="form-control custom-select">
                                    <option value="">Please Select</option>
                                    <?php
									foreach($dropdowns['tsas'] as $tsa){
										$sel = "";
										if(isset($filters["tsa"]) && $filters["tsa"] == $tsa["id"]){
											$sel = " selected='selected'";
										}
									?>
									<option value="<?php echo $tsa["id"];?>"<?php echo $sel;?>><?php echo ucfirst($tsa["first_name"]) . " ". ucfirst($tsa["last_name"]) . "(".$tsa["call_center_name"].")";?></option>
									<?php
									}
									?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Call Center', 'call_center', array('class' => 'form-label'));?>
                                <select name="call_center" id="call_center" class="form-control custom-select">
                                	<option value="">Please Select</option>
                                    <?php
									foreach($dropdowns['call_centers'] as $call_center){
										$sel = "";
										if(isset($filters["call_centers"]) && $filters["call_centers"] == $call_center["id"]){
											$sel = " selected='selected'";
										}
									?>
									<option value="<?php echo $call_center["id"];?>"<?php echo $sel;?>><?php echo ucfirst($call_center["name"]);?></option>
									<?php
									}
									?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('CSR', 'csr', array('class' => 'form-label'));?>
                               <select name="csr" id="csr" class="form-control custom-select">
                                    <option value="">Please Select</option>
                                    <?php
									foreach($dropdowns['csrs'] as $csr){
										$sel = "";
										if(isset($filters["csr"]) && $filters["csr"] == $csr["id"]){
											$sel = " selected='selected'";
										}
									?>
									<option value="<?php echo $csr["id"];?>"<?php echo $sel;?>><?php echo ucfirst($csr["first_name"]) . " ". ucfirst($csr["last_name"]) . "(".$csr["call_center_name"].")";?></option>
									<?php
									}
									?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Page Size', 'page_size', array('class' => 'form-label'));?>
                               <select name="page_size" id="page_size" class="form-control custom-select">
                                    <option value="">Please Size</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                    <option value="150">150</option>
                                    <option value="200">200</option>
                                    <option value="250">250</option>
                                    <option value="500">500</option>
                                    <option value="1000">1000</option>
                                </select>
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