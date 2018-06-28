<div class="page">
      <div class="page-main">
          <div class="page-content">
              <div class="container">
              <div class="row">
                <div class="col-12">
                <form class="card" id="" method="get">
                    	<div class="card-body">
                        	<div class="row">
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#menu1">CEO</a></li>
    <li><a href="#menu2">Management</a></li>
    <li><a href="#menu3">Teamlead</a></li>
    <li><a href="#menu4">CSR</a></li>
    <li><a href="#menu5">TSA</a></li>
    <li><a href="#menu6">Back Office</a></li>
    <li><a href="#menu7">Daily Sale</a></li>
  </ul>
  </div>
<div class="row">
	<div class="col-12">
  <div class="tab-content">
    <div id="menu1" class="tab-pane fade in active">
      <div class="row row-cards row-deck">
                    <div class="card">
                      <div class="card-body">
                	<?php /*?><div class="">
                        <h4>Report 1</h4>
                    </div><?php */?>
                	<div class="row">
                    	<div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Date Start', 'first_name', array('class' => 'form-label'));?>
                                <input type="text" class="form-control datepicker1" id="first_name" name="first_name" placeholder="" value=""/>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Date End', 'first_name', array('class' => 'form-label'));?>
                                <input type="text" class="form-control datepicker2" id="first_name" name="first_name" placeholder="" value=""/>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('First Name', 'first_name', array('class' => 'form-label'));?>
                                <input type="text" class="form-control " id="first_name" name="first_name" placeholder="First Name" value="<?php echo (isset($filters["first_name"]) && $filters["first_name"] != "")?$filters["first_name"]:"";?>"/>
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
                                <?php echo form_label('Package Classification', 'email', array('class' => 'form-label'));?>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Package Classification" value="<?php echo (isset($filters["email"]) && $filters["email"] != "")?$filters["email"]:"";?>"/>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Plan Short', 'email', array('class' => 'form-label'));?>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Plan Short" value="<?php echo (isset($filters["email"]) && $filters["email"] != "")?$filters["email"]:"";?>"/>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('City', 'email', array('class' => 'form-label'));?>
                                <input type="text" class="form-control" id="email" name="email" placeholder="City" value="<?php echo (isset($filters["email"]) && $filters["email"] != "")?$filters["email"]:"";?>"/>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Directory No.', 'email', array('class' => 'form-label'));?>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Directory No." value="<?php echo (isset($filters["email"]) && $filters["email"] != "")?$filters["email"]:"";?>"/>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Sim Serial No.', 'email', array('class' => 'form-label'));?>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Sim Serial No." value="<?php echo (isset($filters["email"]) && $filters["email"] != "")?$filters["email"]:"";?>"/>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Customer Name', 'email', array('class' => 'form-label'));?>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Customer Name" value="<?php echo (isset($filters["email"]) && $filters["email"] != "")?$filters["email"]:"";?>"/>
                            </div>
                        </div>
                        <div class="col-12"></div>
                        <div class="col-md-6 col-lg-6 selection_wrapper">
                            <div class="form-group">
                            	<label class="fomr-label"><i class="fe fe-arrow-right"></i> <i class="fe fe-arrow-right"></i></label>
                                <select name="seletion_1" class="form-control custom-select selection1 selection-group" multiple="multiple">
                                    <option value="1">Team Leader</option>
                                    <option value="2">Package Classification</option>
                                    <option value="3">Plan Short</option>
                                    <option value="4">Lead Classification</option>
                                    <option value="5">City</option>
                                    <option value="6">Activation Agent</option>
                                    <option value="7">Sim Serial No.</option>
                                    <option value="8">Customer Name</option>
                                    <option value="9">Promo Device</option>
                                    <option value="10">Handset Type</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 selection_wrapper2">
                            <div class="form-group">
                            <label class="fomr-label"><i class="fe fe-arrow-left"></i> <i class="fe fe-arrow-left"></i></label>
                               <select name="seletion_2" class="form-control custom-select selection2 selection-group" multiple="multiple">
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                    </div>
                </div>
    </div>
    <div id="menu2" class="tab-pane fade">
      <div class="row row-cards row-deck">
                    <div class="card">
                      <div class="card-body">
                	<?php /*?><div class="">
                        <h4>Report 2</h4>
                    </div><?php */?>
                	<div class="row">
                    	<div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Date Start', 'first_name', array('class' => 'form-label'));?>
                                <input type="text" class="form-control datepicker1" id="first_name" name="first_name" placeholder="" value=""/>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Date End', 'first_name', array('class' => 'form-label'));?>
                                <input type="text" class="form-control datepicker2" id="first_name" name="first_name" placeholder="" value=""/>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('First Name', 'first_name', array('class' => 'form-label'));?>
                                <input type="text" class="form-control " id="first_name" name="first_name" placeholder="First Name" value="<?php echo (isset($filters["first_name"]) && $filters["first_name"] != "")?$filters["first_name"]:"";?>"/>
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
                                <?php echo form_label('Package Classification', 'email', array('class' => 'form-label'));?>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Package Classification" value="<?php echo (isset($filters["email"]) && $filters["email"] != "")?$filters["email"]:"";?>"/>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Plan Short', 'email', array('class' => 'form-label'));?>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Plan Short" value="<?php echo (isset($filters["email"]) && $filters["email"] != "")?$filters["email"]:"";?>"/>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('City', 'email', array('class' => 'form-label'));?>
                                <input type="text" class="form-control" id="email" name="email" placeholder="City" value="<?php echo (isset($filters["email"]) && $filters["email"] != "")?$filters["email"]:"";?>"/>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Directory No.', 'email', array('class' => 'form-label'));?>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Directory No." value="<?php echo (isset($filters["email"]) && $filters["email"] != "")?$filters["email"]:"";?>"/>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Sim Serial No.', 'email', array('class' => 'form-label'));?>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Sim Serial No." value="<?php echo (isset($filters["email"]) && $filters["email"] != "")?$filters["email"]:"";?>"/>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Customer Name', 'email', array('class' => 'form-label'));?>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Customer Name" value="<?php echo (isset($filters["email"]) && $filters["email"] != "")?$filters["email"]:"";?>"/>
                            </div>
                        </div>
                        <div class="col-12"></div>
                        <div class="col-md-6 col-lg-6 selection_wrapper">
                            <div class="form-group">
                            	<label class="fomr-label"><i class="fe fe-arrow-right"></i> <i class="fe fe-arrow-right"></i></label>
                                <select name="seletion_1" class="form-control custom-select selection1 selection-group" multiple="multiple">
                                    <option value="1">Team Leader</option>
                                    <option value="2">Package Classification</option>
                                    <option value="3">Plan Short</option>
                                    <option value="4">Lead Classification</option>
                                    <option value="5">City</option>
                                    <option value="6">Activation Agent</option>
                                    <option value="7">Sim Serial No.</option>
                                    <option value="8">Customer Name</option>
                                    <option value="9">Promo Device</option>
                                    <option value="10">Handset Type</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 selection_wrapper2">
                            <div class="form-group">
                            <label class="fomr-label"><i class="fe fe-arrow-left"></i> <i class="fe fe-arrow-left"></i></label>
                               <select name="seletion_2" class="form-control custom-select selection2 selection-group" multiple="multiple">
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                    </div>
                </div>
    </div>
    <div id="menu3" class="tab-pane fade">
      <div class="row row-cards row-deck">
                    <div class="card">
                      <div class="card-body">
                	<?php /*?><div class="">
                        <h4>Report 3</h4>
                    </div><?php */?>
                	<div class="row">
                    	<div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Date Start', 'first_name', array('class' => 'form-label'));?>
                                <input type="text" class="form-control datepicker1" id="first_name" name="first_name" placeholder="" value=""/>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Date End', 'first_name', array('class' => 'form-label'));?>
                                <input type="text" class="form-control datepicker2" id="first_name" name="first_name" placeholder="" value=""/>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('First Name', 'first_name', array('class' => 'form-label'));?>
                                <input type="text" class="form-control " id="first_name" name="first_name" placeholder="First Name" value="<?php echo (isset($filters["first_name"]) && $filters["first_name"] != "")?$filters["first_name"]:"";?>"/>
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
                                <?php echo form_label('Package Classification', 'email', array('class' => 'form-label'));?>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Package Classification" value="<?php echo (isset($filters["email"]) && $filters["email"] != "")?$filters["email"]:"";?>"/>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Plan Short', 'email', array('class' => 'form-label'));?>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Plan Short" value="<?php echo (isset($filters["email"]) && $filters["email"] != "")?$filters["email"]:"";?>"/>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('City', 'email', array('class' => 'form-label'));?>
                                <input type="text" class="form-control" id="email" name="email" placeholder="City" value="<?php echo (isset($filters["email"]) && $filters["email"] != "")?$filters["email"]:"";?>"/>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Directory No.', 'email', array('class' => 'form-label'));?>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Directory No." value="<?php echo (isset($filters["email"]) && $filters["email"] != "")?$filters["email"]:"";?>"/>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Sim Serial No.', 'email', array('class' => 'form-label'));?>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Sim Serial No." value="<?php echo (isset($filters["email"]) && $filters["email"] != "")?$filters["email"]:"";?>"/>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Customer Name', 'email', array('class' => 'form-label'));?>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Customer Name" value="<?php echo (isset($filters["email"]) && $filters["email"] != "")?$filters["email"]:"";?>"/>
                            </div>
                        </div>
                        <div class="col-12"></div>
                        <div class="col-md-6 col-lg-6 selection_wrapper">
                            <div class="form-group">
                            	<label class="fomr-label"><i class="fe fe-arrow-right"></i> <i class="fe fe-arrow-right"></i></label>
                                <select name="seletion_1" class="form-control custom-select selection1 selection-group" multiple="multiple">
                                    <option value="1">Team Leader</option>
                                    <option value="2">Package Classification</option>
                                    <option value="3">Plan Short</option>
                                    <option value="4">Lead Classification</option>
                                    <option value="5">City</option>
                                    <option value="6">Activation Agent</option>
                                    <option value="7">Sim Serial No.</option>
                                    <option value="8">Customer Name</option>
                                    <option value="9">Promo Device</option>
                                    <option value="10">Handset Type</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 selection_wrapper2">
                            <div class="form-group">
                            <label class="fomr-label"><i class="fe fe-arrow-left"></i> <i class="fe fe-arrow-left"></i></label>
                               <select name="seletion_2" class="form-control custom-select selection2 selection-group" multiple="multiple">
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                    </div>
                </div>
    </div>
    <div id="menu4" class="tab-pane fade">
      <div class="row row-cards row-deck">
                    <div class="card">
                      <div class="card-body">
                	<?php /*?><div class="">
                        <h4>Report 4</h4>
                    </div><?php */?>
                	<div class="row">
                    	<div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Date Start', 'first_name', array('class' => 'form-label'));?>
                                <input type="text" class="form-control datepicker1" id="first_name" name="first_name" placeholder="" value=""/>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Date End', 'first_name', array('class' => 'form-label'));?>
                                <input type="text" class="form-control datepicker2" id="first_name" name="first_name" placeholder="" value=""/>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('First Name', 'first_name', array('class' => 'form-label'));?>
                                <input type="text" class="form-control " id="first_name" name="first_name" placeholder="First Name" value="<?php echo (isset($filters["first_name"]) && $filters["first_name"] != "")?$filters["first_name"]:"";?>"/>
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
                                <?php echo form_label('Package Classification', 'email', array('class' => 'form-label'));?>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Package Classification" value="<?php echo (isset($filters["email"]) && $filters["email"] != "")?$filters["email"]:"";?>"/>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Plan Short', 'email', array('class' => 'form-label'));?>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Plan Short" value="<?php echo (isset($filters["email"]) && $filters["email"] != "")?$filters["email"]:"";?>"/>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('City', 'email', array('class' => 'form-label'));?>
                                <input type="text" class="form-control" id="email" name="email" placeholder="City" value="<?php echo (isset($filters["email"]) && $filters["email"] != "")?$filters["email"]:"";?>"/>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Directory No.', 'email', array('class' => 'form-label'));?>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Directory No." value="<?php echo (isset($filters["email"]) && $filters["email"] != "")?$filters["email"]:"";?>"/>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Sim Serial No.', 'email', array('class' => 'form-label'));?>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Sim Serial No." value="<?php echo (isset($filters["email"]) && $filters["email"] != "")?$filters["email"]:"";?>"/>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Customer Name', 'email', array('class' => 'form-label'));?>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Customer Name" value="<?php echo (isset($filters["email"]) && $filters["email"] != "")?$filters["email"]:"";?>"/>
                            </div>
                        </div>
                        <div class="col-12"></div>
                        <div class="col-md-6 col-lg-6 selection_wrapper">
                            <div class="form-group">
                            	<label class="fomr-label"><i class="fe fe-arrow-right"></i> <i class="fe fe-arrow-right"></i></label>
                                <select name="seletion_1" class="form-control custom-select selection1 selection-group" multiple="multiple">
                                    <option value="1">Team Leader</option>
                                    <option value="2">Package Classification</option>
                                    <option value="3">Plan Short</option>
                                    <option value="4">Lead Classification</option>
                                    <option value="5">City</option>
                                    <option value="6">Activation Agent</option>
                                    <option value="7">Sim Serial No.</option>
                                    <option value="8">Customer Name</option>
                                    <option value="9">Promo Device</option>
                                    <option value="10">Handset Type</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 selection_wrapper2">
                            <div class="form-group">
                            <label class="fomr-label"><i class="fe fe-arrow-left"></i> <i class="fe fe-arrow-left"></i></label>
                               <select name="seletion_2" class="form-control custom-select selection2 selection-group" multiple="multiple">
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                    </div>
                </div>
    </div>
    <div id="menu5" class="tab-pane fade">
      <div class="row row-cards row-deck">
                    <div class="card">
                      <div class="card-body">
                	<?php /*?><div class="">
                        <h4>Report 5</h4>
                    </div><?php */?>
                	<div class="row">
                    	<div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Date Start', 'first_name', array('class' => 'form-label'));?>
                                <input type="text" class="form-control datepicker1" id="first_name" name="first_name" placeholder="" value=""/>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Date End', 'first_name', array('class' => 'form-label'));?>
                                <input type="text" class="form-control datepicker2" id="first_name" name="first_name" placeholder="" value=""/>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('First Name', 'first_name', array('class' => 'form-label'));?>
                                <input type="text" class="form-control " id="first_name" name="first_name" placeholder="First Name" value="<?php echo (isset($filters["first_name"]) && $filters["first_name"] != "")?$filters["first_name"]:"";?>"/>
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
                                <?php echo form_label('Package Classification', 'email', array('class' => 'form-label'));?>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Package Classification" value="<?php echo (isset($filters["email"]) && $filters["email"] != "")?$filters["email"]:"";?>"/>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Plan Short', 'email', array('class' => 'form-label'));?>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Plan Short" value="<?php echo (isset($filters["email"]) && $filters["email"] != "")?$filters["email"]:"";?>"/>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('City', 'email', array('class' => 'form-label'));?>
                                <input type="text" class="form-control" id="email" name="email" placeholder="City" value="<?php echo (isset($filters["email"]) && $filters["email"] != "")?$filters["email"]:"";?>"/>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Directory No.', 'email', array('class' => 'form-label'));?>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Directory No." value="<?php echo (isset($filters["email"]) && $filters["email"] != "")?$filters["email"]:"";?>"/>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Sim Serial No.', 'email', array('class' => 'form-label'));?>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Sim Serial No." value="<?php echo (isset($filters["email"]) && $filters["email"] != "")?$filters["email"]:"";?>"/>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Customer Name', 'email', array('class' => 'form-label'));?>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Customer Name" value="<?php echo (isset($filters["email"]) && $filters["email"] != "")?$filters["email"]:"";?>"/>
                            </div>
                        </div>
                        <div class="col-12"></div>
                        <div class="col-md-6 col-lg-6 selection_wrapper">
                            <div class="form-group">
                            	<label class="fomr-label"><i class="fe fe-arrow-right"></i> <i class="fe fe-arrow-right"></i></label>
                                <select name="seletion_1" class="form-control custom-select selection1 selection-group" multiple="multiple">
                                    <option value="1">Team Leader</option>
                                    <option value="2">Package Classification</option>
                                    <option value="3">Plan Short</option>
                                    <option value="4">Lead Classification</option>
                                    <option value="5">City</option>
                                    <option value="6">Activation Agent</option>
                                    <option value="7">Sim Serial No.</option>
                                    <option value="8">Customer Name</option>
                                    <option value="9">Promo Device</option>
                                    <option value="10">Handset Type</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 selection_wrapper2">
                            <div class="form-group">
                            <label class="fomr-label"><i class="fe fe-arrow-left"></i> <i class="fe fe-arrow-left"></i></label>
                               <select name="seletion_2" class="form-control custom-select selection2 selection-group" multiple="multiple">
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                    </div>
                </div>
    </div>
    <div id="menu6" class="tab-pane fade">
      <div class="row row-cards row-deck">
                    <div class="card">
                      <div class="card-body">
                	<?php /*?><div class="">
                        <h4>Report 6</h4>
                    </div><?php */?>
                	<div class="row">
                    	<div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Date Start', 'first_name', array('class' => 'form-label'));?>
                                <input type="text" class="form-control datepicker1" id="first_name" name="first_name" placeholder="" value=""/>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Date End', 'first_name', array('class' => 'form-label'));?>
                                <input type="text" class="form-control datepicker2" id="first_name" name="first_name" placeholder="" value=""/>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('First Name', 'first_name', array('class' => 'form-label'));?>
                                <input type="text" class="form-control " id="first_name" name="first_name" placeholder="First Name" value="<?php echo (isset($filters["first_name"]) && $filters["first_name"] != "")?$filters["first_name"]:"";?>"/>
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
                                <?php echo form_label('Package Classification', 'email', array('class' => 'form-label'));?>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Package Classification" value="<?php echo (isset($filters["email"]) && $filters["email"] != "")?$filters["email"]:"";?>"/>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Plan Short', 'email', array('class' => 'form-label'));?>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Plan Short" value="<?php echo (isset($filters["email"]) && $filters["email"] != "")?$filters["email"]:"";?>"/>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('City', 'email', array('class' => 'form-label'));?>
                                <input type="text" class="form-control" id="email" name="email" placeholder="City" value="<?php echo (isset($filters["email"]) && $filters["email"] != "")?$filters["email"]:"";?>"/>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Directory No.', 'email', array('class' => 'form-label'));?>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Directory No." value="<?php echo (isset($filters["email"]) && $filters["email"] != "")?$filters["email"]:"";?>"/>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Sim Serial No.', 'email', array('class' => 'form-label'));?>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Sim Serial No." value="<?php echo (isset($filters["email"]) && $filters["email"] != "")?$filters["email"]:"";?>"/>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Customer Name', 'email', array('class' => 'form-label'));?>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Customer Name" value="<?php echo (isset($filters["email"]) && $filters["email"] != "")?$filters["email"]:"";?>"/>
                            </div>
                        </div>
                        <div class="col-12"></div>
                        <div class="col-md-6 col-lg-6 selection_wrapper">
                            <div class="form-group">
                            	<label class="fomr-label"><i class="fe fe-arrow-right"></i> <i class="fe fe-arrow-right"></i></label>
                                <select name="seletion_1" class="form-control custom-select selection1 selection-group" multiple="multiple">
                                    <option value="1">Team Leader</option>
                                    <option value="2">Package Classification</option>
                                    <option value="3">Plan Short</option>
                                    <option value="4">Lead Classification</option>
                                    <option value="5">City</option>
                                    <option value="6">Activation Agent</option>
                                    <option value="7">Sim Serial No.</option>
                                    <option value="8">Customer Name</option>
                                    <option value="9">Promo Device</option>
                                    <option value="10">Handset Type</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 selection_wrapper2">
                            <div class="form-group">
                            <label class="fomr-label"><i class="fe fe-arrow-left"></i> <i class="fe fe-arrow-left"></i></label>
                               <select name="seletion_2" class="form-control custom-select selection2 selection-group" multiple="multiple">
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                    </div>
                </div>
    </div>
    <div id="menu7" class="tab-pane fade">
      <div class="row row-cards row-deck">
                    <div class="card">
                      <div class="card-body">
                	<?php /*?><div class="">
                        <h4>Report 7</h4>
                    </div><?php */?>
                	<div class="row">
                    	<div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Date Start', 'first_name', array('class' => 'form-label'));?>
                                <input type="text" class="form-control datepicker1" id="first_name" name="first_name" placeholder="" value=""/>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Date End', 'first_name', array('class' => 'form-label'));?>
                                <input type="text" class="form-control datepicker2" id="first_name" name="first_name" placeholder="" value=""/>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('First Name', 'first_name', array('class' => 'form-label'));?>
                                <input type="text" class="form-control " id="first_name" name="first_name" placeholder="First Name" value="<?php echo (isset($filters["first_name"]) && $filters["first_name"] != "")?$filters["first_name"]:"";?>"/>
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
                                <?php echo form_label('Package Classification', 'email', array('class' => 'form-label'));?>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Package Classification" value="<?php echo (isset($filters["email"]) && $filters["email"] != "")?$filters["email"]:"";?>"/>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Plan Short', 'email', array('class' => 'form-label'));?>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Plan Short" value="<?php echo (isset($filters["email"]) && $filters["email"] != "")?$filters["email"]:"";?>"/>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('City', 'email', array('class' => 'form-label'));?>
                                <input type="text" class="form-control" id="email" name="email" placeholder="City" value="<?php echo (isset($filters["email"]) && $filters["email"] != "")?$filters["email"]:"";?>"/>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Directory No.', 'email', array('class' => 'form-label'));?>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Directory No." value="<?php echo (isset($filters["email"]) && $filters["email"] != "")?$filters["email"]:"";?>"/>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Sim Serial No.', 'email', array('class' => 'form-label'));?>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Sim Serial No." value="<?php echo (isset($filters["email"]) && $filters["email"] != "")?$filters["email"]:"";?>"/>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Customer Name', 'email', array('class' => 'form-label'));?>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Customer Name" value="<?php echo (isset($filters["email"]) && $filters["email"] != "")?$filters["email"]:"";?>"/>
                            </div>
                        </div>
                        <div class="col-12"></div>
                        <div class="col-md-6 col-lg-6 selection_wrapper">
                            <div class="form-group">
                            	<label class="fomr-label"><i class="fe fe-arrow-right"></i> <i class="fe fe-arrow-right"></i></label>
                                <select name="seletion_1" class="form-control custom-select selection1 selection-group" multiple="multiple">
                                    <option value="1">Team Leader</option>
                                    <option value="2">Package Classification</option>
                                    <option value="3">Plan Short</option>
                                    <option value="4">Lead Classification</option>
                                    <option value="5">City</option>
                                    <option value="6">Activation Agent</option>
                                    <option value="7">Sim Serial No.</option>
                                    <option value="8">Customer Name</option>
                                    <option value="9">Promo Device</option>
                                    <option value="10">Handset Type</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 selection_wrapper2">
                            <div class="form-group">
                            <label class="fomr-label"><i class="fe fe-arrow-left"></i> <i class="fe fe-arrow-left"></i></label>
                               <select name="seletion_2" class="form-control custom-select selection2 selection-group" multiple="multiple">
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
  <div class="">
                  <div class="d-flex">
                    <button type="submit" class="btn btn-primary ml-auto">Generate</button>
                  </div>
                </div>
  </div>
  </form>
                	<?php /*?><form class="card" id="" method="get">
                    	<div class="card-body">
                        	<div class="row">
                                <div class="col-md-3 col-lg-3">
                                    <div class="form-group">
                                      <div class="d-flex">
                            <button type="button" class="btn btn-primary" id="users_clear_filter">Clear Filter</button>
                            <button type="submit" class="btn btn-primary ml-auto" id="users_apply_filter">Apply Filter</button>
                          </div>  
                                    </div>
                                </div>
                                <div class="col-md-3 col-lg-3">
                                      <div class="d-flex">
                            <button type="button" class="btn btn-primary" id="users_clear_filter">Clear Filter</button>
                            <button type="submit" class="btn btn-primary ml-auto" id="users_apply_filter">Apply Filter</button>
                          </div>  
                                    </div>
                                </div>
                        </div>
                        
                        //<div class="card-footer text-right">
//                          <div class="d-flex">
//                            <button type="button" class="btn btn-primary" id="users_clear_filter">Clear Filter</button>
//                            <button type="submit" class="btn btn-primary ml-auto" id="users_apply_filter">Apply Filter</button>
//                          </div>
//                        </div>
                    </form><?php */?>
                </div>
              </div>
                
                
                
                
                
              </div>
          </div>
      </div>
<style>
.nav-tabs {
    border-bottom: 1px solid #ddd;
}
.nav {
    padding-left: 0;
    margin-bottom: 0;
    list-style: none;
}.btn-group-vertical>.btn-group:after, .btn-group-vertical>.btn-group:before, .btn-toolbar:after, .btn-toolbar:before, .col-12:after, .col-12:before, .container-fluid:after, .container-fluid:before, .container:after, .container:before, .dl-horizontal dd:after, .dl-horizontal dd:before, .form-horizontal .form-group:after, .form-horizontal .form-group:before, .modal-footer:after, .modal-footer:before, .modal-header:after, .modal-header:before, .nav:after, .nav:before, .navbar-collapse:after, .navbar-collapse:before, .navbar-header:after, .navbar-header:before, .navbar:after, .navbar:before, .pager:after, .pager:before, .panel-body:after, .panel-body:before, .row:after, .row:before {
    display: table;
    content: " ";
}

:after, :before {
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}.nav-tabs>li {
    float: left;
    margin-bottom: -1px;
}
.nav>li {
    position: relative;
    display: block;
}.nav-tabs>li.active>a, .nav-tabs>li.active>a:focus, .nav-tabs>li.active>a:hover {
    color: #555;
    cursor: default;
    background-color: #fff;
    border: 1px solid #ddd;
    border-bottom-color: transparent;
}
.nav-tabs>li>a {
    margin-right: 2px;
    line-height: 1.42857143;
    border: 1px solid transparent;
    border-radius: 4px 4px 0 0;
}
.nav>li>a {
    position: relative;
    display: block;
    padding: 10px 15px;
}
.tab-content>.tab-pane.active {
    display: block;
}
.tab-content>.tab-pane {
    display: none;
}
.fade.in {
    opacity: 1;
}
.fade {
    opacity: 0;
    -webkit-transition: opacity .15s linear;
    -o-transition: opacity .15s linear;
    transition: opacity .15s linear;
}
.tab-content>.tab-pane {
    display: none;
}
.fade {
    opacity: 0;
    -webkit-transition: opacity .15s linear;
    -o-transition: opacity .15s linear;
    transition: opacity .15s linear;
}
.selection-group{
	min-height:200px;
}
</style>
<script>
//selection_wrapper
$(document).on("dblclick", ".selection1 option", function(){
	console.log($(this));;
		console.log($(this)[0]["outerHTML"]);
		$($(".selection2", $(this).closest(".selection_wrapper").next(".selection_wrapper2"))).append($(this)[0]["outerHTML"]);
		$(this).remove();
});

$(document).on("dblclick", ".selection2 option", function(){
	console.log($(this));;
		console.log($(this)[0]["outerHTML"]);
		$($(".selection1", $(this).closest(".selection_wrapper2").prev(".selection_wrapper"))).append($(this)[0]["outerHTML"]);
		$(this).remove();
});
$(document).ready(function(){
	$(".datepicker1, .datepicker2").datepicker();
});
/*$(document).ready(function(){
	$(".selection1 option").on("dblclick",function(){
		
		//$(this).remove();
	});
	
	$(".selection2 option").on("dblclick",function(){
		console.log($(this));;
		console.log($(this)[0]["outerHTML"]);
		$($(".selection1", $(this).closest(".selection_wrapper").next(".selection_wrapper2"))).append($(this)[0]["outerHTML"]);
		$(this).remove();
	});
});*/
</script>
<style>.ui-datepicker-close.ui-state-default.ui-priority-primary.ui-corner-all.clear_this_date{left:0;margin:.5em auto .4em;position:absolute;right:0;text-align:center;width:100%;max-width:80px;color:#999;border:1px solid #999;font-weight:normal;}.col-12 {
    overflow: auto;
}</style>