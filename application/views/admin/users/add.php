<?php
//echo "<pre>"; print_r($detail); echo "</pre>";
$username = array(
	"name" => "username",
	"id"   => "username",
	"type" => "text",
	"value" => (isset($_REQUEST["username"]))?$_REQUEST["username"]:(isset($detail["username"])?$detail["username"]:""),
	"class" => "form-control"
);
$password = array(
	"name" => "password",
	"id"   => "password",
	"type" => "password",
	"value" => (isset($_REQUEST["password"]))?$_REQUEST["password"]:(isset($detail["password"])?$detail["password"]:""),
	"class" => "form-control"
);
$first_name = array(
	"name" => "first_name",
	"id"   => "first_name",
	"type" => "text",
	"value" => (isset($_REQUEST["first_name"]))?$_REQUEST["first_name"]:(isset($detail["first_name"])?$detail["first_name"]:""),
	"class" => "form-control"
);
$last_name = array(
	"name" => "last_name",
	"id"   => "last_name",
	"type" => "text",
	"value" => (isset($_REQUEST["last_name"]))?$_REQUEST["last_name"]:(isset($detail["last_name"])?$detail["last_name"]:""),
	"class" => "form-control"
);
$email = array(
	"name" => "email",
	"id"   => "email",
	"type" => "email",
	"value" => (isset($_REQUEST["email"]))?$_REQUEST["email"]:(isset($detail["email"])?$detail["email"]:""),
	"class" => "form-control"
);

?>
      <div class="page-content">
          <div class="container">
            <div class="row">
                <div class="col-12">
                	<form class="card" id="add_user_form" enctype="multipart/form-data" method="post">
                    	<div class="card-header">
                        	<h3 class="card-title"><?php echo $mode;?> User</h3>
                        </div>
                        <div class="card-body">
                        	<div class="row">
                        	<div class="col-md-3 col-lg-3">
                                <div class="form-group">
                                    <?php echo form_label('Username', 'username', array('class' => 'form-label'));?>
                                    <?php echo form_input($username);?>
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-3">
                                <div class="form-group">
                                    <?php echo form_label('Password', 'password', array('class' => 'form-label'));?>
                                    <?php echo form_input($password);?>
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-3">
                                <div class="form-group">
                                    <?php echo form_label('First Name', 'first_name', array('class' => 'form-label'));?>
                                    <?php echo form_input($first_name);?>
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-3">
                                <div class="form-group">
                                    <?php echo form_label('Last Name', 'last_name', array('class' => 'form-label'));?>
                                    <?php echo form_input($last_name);?>
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-3">
                                <div class="form-group">
                                    <?php echo form_label('Email', 'email', array('class' => 'form-label'));?>
                                    <?php echo form_input($email);?>
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-3">
                                <div class="form-group">
                                	<label for="is_active" class="form-label">Active</label>
                                	<select name="is_active" id="is_active" class="form-control custom-select">
										<?php
                                        $val = (isset($_REQUEST["is_active"]))?$_REQUEST["is_active"]:(isset($detail["is_active"])?$detail["is_active"]:"");
                                        ?>
                                        <option value="1" <?php echo ($val == '1')?'selected="selected"':"";?>>Yes</option>
                                        <option value="0" <?php echo ($val == '0')?'selected="selected"':"";?>>No</option>                            
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-3">
                                <div class="form-group">
                                	<label for="call_center" class="form-label">Call Center</label>
                                	<select name="call_center" id="call_center" class="form-control custom-select">
                                        <option value="">Please select</option>
                                        <?php
                                        $val = (isset($_REQUEST["call_center"]))?$_REQUEST["call_center"]:(isset($detail["call_center"])?$detail["call_center"]:"");
                                        foreach($call_centers as $call_center){
                                        ?>
                                        <option value="<?php echo $call_center["id"];?>" <?php echo ($val == $call_center["id"])?'selected="selected"':"";?>><?php echo ucfirst($call_center["name"]);?></option>
                                        <?php
                                        }
                                        ?>                           
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-12">
                                <div class="form-group">
                                	<label for="user_type" class="form-label">User Type</label>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-12 form-group">
                                    <?php
                                        ////1: admin, 2: number creator, 3: back office, 4: Teamlead, 5: telesales agent 6: CSR 7: DSR                                        
                                        foreach($user_type as $utype){
                                            $val = (isset($_REQUEST["user_type"]))?$_REQUEST["user_type"]:(isset($detail["user_type"])?$detail["user_type"]:"");
                                            ?>
                                <div class="form-check-inline col-md-2">
                                            <input type="checkbox" value="<?php echo $utype["id"];?>" name="user_type[]" <?php echo ($val && in_array($utype["id"], $val))?'checked':"";?> class="user_type" /> <label for="user_type[]" class="form-label checkbox-label"><?php echo ucwords($utype["user_type"]);?></label>
                            </div>
                                            <?php
                                        }?>
                             </div>
                               
                            <?php /*?><div class="col-md-3 col-lg-3">
                                <div class="form-group">
                                	<label for="user_type" class="form-label">User Type</label>
                                    
                                	<select name="user_type[]" id="user_type" multiple="multiple" class="form-control custom-select">
										<?php
                                        ////1: admin, 2: number creator, 3: back office, 4: Teamlead, 5: telesales agent 6: CSR 7: DSR
                                        
                                        foreach($user_type as $utype){
                                            $val = (isset($_REQUEST["user_type"]))?$_REQUEST["user_type"]:(isset($detail["user_type"])?$detail["user_type"]:"");
                                            ?>
                                            <option value="<?php echo $utype["id"];?>" <?php echo ($val && in_array($utype["id"], $val))?'selected="selected"':"";?>><?php echo ucwords($utype["user_type"]);?></option>
                                            <?php
                                        }?>
                                    </select>
                                </div>
                            </div><?php */?>
                            <?php $val = (isset($_REQUEST["user_type"]) && in_array(5, $_REQUEST["user_type"]))?"block":((isset($detail["user_type"]) && in_array(5, $detail["user_type"]))?"block":"none");?>
                            <div class="col-md-3 col-lg-3 teamlead_agent_select" style=" display:<?php echo $val;?>">
                                
                                <div class="form-group teamlead_agent_select" style=" display:<?php echo $val;?>">
                                	<label for="teamlead_agent" class="form-label">Teamlead</label>
                                	<select name="teamlead_agent" id="teamlead_agent" <?php echo ($val != "none")?"":"disabled";?> class="form-control custom-select">
                                        <option value="">Please select</option>
                                        <?php
                                        ////1: admin, 2: number creator, 3: back office, 4: Teamlead, 5: telesales agent
                                        $val = (isset($_REQUEST["teamlead_agent"]))?$_REQUEST["teamlead_agent"]:(isset($detail["teamlead_id"])?$detail["teamlead_id"]:"");
                                        foreach($teamleads as $teamlead){
                                        ?>
                                            <option value="<?php echo $teamlead["id"]?>" <?php echo ($val == $teamlead["id"])?'selected="selected"':"";?>><?php echo ucfirst($teamlead["first_name"]) . " ".ucfirst($teamlead["last_name"]);?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            
                            <?php $val = (isset($_REQUEST["user_type"]) && in_array(6, $_REQUEST["user_type"]))?"block":((isset($detail["user_type"]) && in_array(6, $detail["user_type"]))?"block":"none");?>
                            <div class="col-md-3 col-lg-3 teamlead_csr_select" style=" display:<?php echo $val;?>">
                                
                                <div class="form-group teamlead_csr_select" style=" display:<?php echo $val;?>">
                                	<label for="teamlead_csr" class="form-label">TL CSR</label>
                                	<select name="teamlead_csr" id="teamlead_csr" <?php echo ($val != "none")?"":"disabled";?> class="form-control custom-select">
                                        <option value="">Please select</option>
                                        <?php
                                        ////1: admin, 2: number creator, 3: back office, 4: Teamlead, 5: telesales agent
                                        $val = (isset($_REQUEST["teamlead_csr"]))?$_REQUEST["teamlead_csr"]:(isset($detail["teamlead_id"])?$detail["teamlead_id"]:"");
                                        foreach($teamleads_csr as $teamlead){
                                        ?>
                                            <option value="<?php echo $teamlead["id"]?>" <?php echo ($val == $teamlead["id"])?'selected="selected"':"";?>><?php echo ucfirst($teamlead["first_name"]) . " ".ucfirst($teamlead["last_name"]);?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            
                            <?php 
							//echo "teamlead_id:".$detail["teamlead_id"]."<br>";
							$val = (isset($_REQUEST["user_type"]) && in_array(7, $_REQUEST["user_type"]))?"block":((isset($detail["user_type"]) && in_array(7, $detail["user_type"]))?"block":"none");?>
                            <div class="col-md-3 col-lg-3 teamlead_dse_select" style=" display:<?php echo $val;?>">
                                
                                <div class="form-group teamlead_dse_select" style=" display:<?php echo $val;?>">
                                	<label for="teamlead_dse" class="form-label">TL DSE</label>
                                	<select name="teamlead_dse" id="teamlead_dse" <?php echo ($val != "none")?"":"disabled";?> class="form-control custom-select">
                                        <option value="">Please select</option>
                                        <?php
                                        ////1: admin, 2: number creator, 3: back office, 4: Teamlead, 5: telesales agent
                                        $val = (isset($_REQUEST["teamlead_dse"]))?$_REQUEST["teamlead_dse"]:(isset($detail["teamlead_id"])?$detail["teamlead_id"]:"");
                                        foreach($teamleads_dse as $teamlead){
                                        ?>
                                            <option value="<?php echo $teamlead["id"]?>" <?php echo ($val == $teamlead["id"])?'selected="selected"':"";?>><?php echo ucfirst($teamlead["first_name"]) . " ".ucfirst($teamlead["last_name"]);?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            
                            <?php 
							//echo "teamlead_bo:".$detail["teamlead_id"]."<br>";
							$val = (isset($_REQUEST["user_type"]) && in_array(3, $_REQUEST["user_type"]))?"block":((isset($detail["user_type"]) && in_array(3, $detail["user_type"]))?"block":"none");?>
                            <div class="col-md-3 col-lg-3 teamlead_bo_select" style=" display:<?php echo $val;?>">
                                
                                <div class="form-group teamlead_bo_select" style=" display:<?php echo $val;?>">
                                	<label for="teamlead_bo" class="form-label">TL BO</label>
                                	<select name="teamlead_bo" id="teamlead_bo" <?php echo ($val != "none")?"":"disabled";?> class="form-control custom-select">
                                        <option value="">Please select</option>
                                        <?php
                                        ////1: admin, 2: number creator, 3: back office, 4: Teamlead, 5: telesales agent
                                        $val = (isset($_REQUEST["teamlead_bo"]))?$_REQUEST["teamlead_bo"]:(isset($detail["teamlead_id"])?$detail["teamlead_id"]:"");
                                        foreach($teamleads_bo as $teamlead){
                                        ?>
                                            <option value="<?php echo $teamlead["id"]?>" <?php echo ($val == $teamlead["id"])?'selected="selected"':"";?>><?php echo ucfirst($teamlead["first_name"]) . " ".ucfirst($teamlead["last_name"]);?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            
                            
                            <?php
							$val = "none";
							if(isset($_REQUEST["user_type"])){
								if(in_array(4, $_REQUEST["user_type"]) || in_array(10, $_REQUEST["user_type"]) || in_array(11, $_REQUEST["user_type"]))
									$val = "block";
							}
							else if(isset($detail["user_type"])){
								if(in_array(4, $detail["user_type"]) || in_array(10, $detail["user_type"]) || in_array(11, $detail["user_type"]))
									$val = "block";
							}
							 //$val = (isset($_REQUEST["user_type"]) && in_array(4, $_REQUEST["user_type"]))?"block":((isset($detail["user_type"]) && in_array(4, $detail["user_type"]))?"block":"none");?>
                            <div class="col-md-3 col-lg-3 manager_select" style=" display:<?php echo $val;?>">
                                
                                <div class="form-group manager_select" style=" display:<?php echo $val;?>">
                                	<label for="manager_id" class="form-label">Manager</label>
                                	<select name="manager_id" id="manager_id" <?php echo ($val != "none")?"":"disabled";?> class="form-control custom-select">
                                        <option value="">Please select</option>
                                        <?php
                                        ////1: admin, 2: number creator, 3: back office, 4: Teamlead, 5: telesales agent
                                        $val = (isset($_REQUEST["manager_id"]))?$_REQUEST["manager_id"]:(isset($detail["manager_id"])?$detail["manager_id"]:"");
                                        foreach($managers as $manager){
                                        ?>
                                            <option value="<?php echo $manager["id"]?>" <?php echo ($val == $manager["id"])?'selected="selected"':"";?>><?php echo ucfirst($manager["first_name"]) . " ".ucfirst($manager["last_name"]);?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-3">                              
                                <div class="form-group">
                                    <?php
                                    $imageCondition = false;
                                    $imagePath = "";
                                    if(isset($detail["avatar"]) && $detail["avatar"] != ""){
                                        $imageCondition = true;
                                        $imagePath = "/uploads/avatars/".$detail["avatar"];
                                    }
                                    ?>
                                    <div class="form-label">Profile Image</div>
                                    <div class="custom-file">                            
                                      <input type="file" class="custom-file-input" id="avatar_upload" name="avatar_upload" >
                                      <input type="hidden" id="avatar" value = "<?php echo ($imageCondition)?$detail["avatar"]:"";?>" name="avatar"/>
                                      <label class="custom-file-label">Choose file</label>
                                    </div>
                                    
                                    <?php /*?><label class="custom-file-upload">
                                        <input type="file" id="avatar_upload" name="avatar_upload"/>
                                        <input type="hidden" id="avatar" value = "<?php echo ($imageCondition)?$detail["avatar"]:"";?>" name="avatar"/>
                                    </label><?php */?>
                                    <div style="width:100%;float:left;">
                                        <img src="<?php echo $imagePath;?>" id="user_avatar_upload" style="display:<?php echo ($imageCondition)?"block":"none";?>";  />
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                          <div class="d-flex">
                            <button type="submit" class="btn btn-primary ml-auto add_user_submit" id="add_user_submit"><?php echo $mode;?> User</button>
                          </div>
                        </div>
                        
                    </form>
                    <input type="hidden" value="<?php echo $mode;?>" id="mode" />
                </div>
            </div>
           </div>
      </div>

<?php /*?><div class="site-wrapper">
	<div class="main-wrappper">
    <h3><?php echo $mode;?> User</h3>
        <div class="admin-content-wraper">
        
        	<div class="x_content"> <?php echo form_open("", array("id" => "add_user_form", "enctype" => "multipart/form-data"));?>
        	<table id="datatable" cellpadding="0" cellspacing="0">
            	<tr>
                    <td><?php echo form_label('Username', 'username', array('class' => 'form-label'));?></td>
                    <td><?php echo form_input($username);?></td>
                </tr>
                <tr>
                    <td><?php echo form_label('Passowrd', 'password', array('class' => 'form-label'));?></td>
                    <td><?php echo form_input($password);?></td>
                </tr>
                <tr>
                    <td><?php echo form_label('First Name', 'first_name', array('class' => 'form-label'));?></td>
                    <td><?php echo form_input($first_name);?></td>
                </tr>
                <tr>
                    <td><?php echo form_label('Last Name', 'last_name', array('class' => 'form-label'));?></td>
                    <td><?php echo form_input($last_name);?></td>
                </tr>
				<tr>
                    <td><?php echo form_label('Email', 'email', array('class' => 'form-label'));?></td>
                    <td><?php echo form_input($email);?></td>
                </tr>
                <tr>
                    <td><label>Profile Image</label></td>
                    <td>
					<?php
					$imageCondition = false;
					$imagePath = "";
					if(isset($detail["avatar"]) && $detail["avatar"] != ""){
						$imageCondition = true;
						$imagePath = "/uploads/avatars/".$detail["avatar"];
					}
					?>
						<label class="custom-file-upload">
							<input type="file" id="avatar_upload" name="avatar_upload"/>
							<input type="hidden" id="avatar" value = "<?php echo ($imageCondition)?$detail["avatar"]:"";?>" name="avatar"/>
							<i class="fa fa-cloud-upload"></i> Select Image
						</label>
						<div style="width:100%;float:left;">
							<img src="<?php echo $imagePath;?>" id="user_avatar_upload" style="display:<?php echo ($imageCondition)?"block":"none";?>";  />
						</div>
					</td>
                </tr>
                <tr>
                    <td><?php echo form_label('Active', 'is_active', array('class' => 'form-label'));?></td>
                    <td>
                        <select name="is_active" id="is_active">
                            <?php
                            $val = (isset($_REQUEST["is_active"]))?$_REQUEST["is_active"]:(isset($detail["is_active"])?$detail["is_active"]:"");
                            ?>
                            <option value="1" <?php echo ($val == '1')?'selected="selected"':"";?>>Yes</option>
                            <option value="0" <?php echo ($val == '0')?'selected="selected"':"";?>>No</option>                            
                        </select>
                    </td>
                </tr>
				<tr>
                    <td><?php echo form_label('Call Center', 'call_center', array('class' => 'form-label'));?></td>
                    <td>
                        <select name="call_center" id="call_center">
							<option value="">Please select</option>
                            <?php
                            $val = (isset($_REQUEST["call_center"]))?$_REQUEST["call_center"]:(isset($detail["call_center"])?$detail["call_center"]:"");
							foreach($call_centers as $call_center){
							?>
							<option value="<?php echo $call_center["id"];?>" <?php echo ($val == $call_center["id"])?'selected="selected"':"";?>><?php echo ucfirst($call_center["name"]);?></option>
							<?php
							}
                            ?>                           
                        </select>
                    </td>
                </tr>
				<tr>
                    <td><?php echo form_label('Language', 'languages', array('class' => 'form-label'));?></td>
                    <td>
                        <select name="languages[]" id="languages" multiple="multiple">
                            <?php
                            
							foreach($languages as $language){
								$val = (isset($_REQUEST["languages"]))?$_REQUEST["languages"]:(isset($detail["languages"])?$detail["languages"]:"");
								?>
								<option value="<?php echo $language["id"];?>" <?php echo ($val && in_array($language["id"], $val))?'selected="selected"':"";?>><?php echo ucwords($language["name"]);?></option>
								<?php
							} ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><?php echo form_label('User Type', 'user_type', array('class' => 'form-label'));?></td>
                    <td>
                        <select name="user_type[]" id="user_type" multiple="multiple">
                            <?php
							////1: admin, 2: number creator, 3: back office, 4: Teamlead, 5: telesales agent 6: CSR 7: DSR
                            
							foreach($user_type as $utype){
								$val = (isset($_REQUEST["user_type"]))?$_REQUEST["user_type"]:(isset($detail["user_type"])?$detail["user_type"]:"");
								?>
								<option value="<?php echo $utype["id"];?>" <?php echo ($val && in_array($utype["id"], $val))?'selected="selected"':"";?>><?php echo ucwords($utype["user_type"]);?></option>
								<?php
							}
                        </select>
                    </td>
                </tr>
                <?php $val = (isset($_REQUEST["user_type"]) && in_array(5, $_REQUEST["user_type"]) && !in_array(4, $_REQUEST["user_type"]))?"block":((isset($detail["user_type"]) && in_array(5, $detail["user_type"]) && !in_array(4, $detail["user_type"]))?"block":"none");?>
                <tr class="teamlead_select" style=" display:<?php echo $val;?>">
                	<td><?php echo form_label('Teamlead', 'teamlead', array('class' => 'form-label'));?></td>
                	<td>
                        <select name="teamlead_id" id="teamlead_id" <?php echo ($val != "none")?"":"disabled";?>>
                        	<option value="">Please select</option>
                            <?php
							////1: admin, 2: number creator, 3: back office, 4: Teamlead, 5: telesales agent
                            $val = (isset($_REQUEST["teamlead_id"]))?$_REQUEST["teamlead_id"]:(isset($detail["teamlead_id"])?$detail["teamlead_id"]:"");
							foreach($teamleads as $teamlead){
                            ?>
                            	<option value="<?php echo $teamlead["id"]?>" <?php echo ($val == $teamlead["id"])?'selected="selected"':"";?>><?php echo ucfirst($teamlead["first_name"]) . " ".ucfirst($teamlead["last_name"]);?></option>
                            <?php
							}
							?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan='2'><?php echo form_submit('add_user_submit', $mode.' User', 'class="add_user_submit" id="add_user_submit"');?></td>
                  </tr>
            </table>
                                <?php echo form_close(); ?>
                                <input type="hidden" value="<?php echo $mode;?>" id="mode" />
                                <div class="clear"></div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
</div><?php */?>
<style>
.checkbox-label{
	margin-left: 10px;
}
</style>