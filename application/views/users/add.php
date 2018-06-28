<?php
$first_name = array(
	"name" => "first_name",
    "id"   => "first_name",
	"type" => "text",
	"value" => (isset($_REQUEST["first_name"]))?$_REQUEST["first_name"]:(isset($detail["first_name"])?$detail["first_name"]:""),
	"class" => "form-control", 
    "required"   => "required"
);
$last_name = array(
	"name" => "last_name",
	"id"   => "last_name",
	"type" => "text",
	"value" => (isset($_REQUEST["last_name"]))?$_REQUEST["last_name"]:(isset($detail["last_name"])?$detail["last_name"]:""),
	"class" => "form-control"
);
$password = array(
    "name" => "password",
    "id"   => "password",
    "type" => "password",
    "value" => "",
    "class" => "form-control"
);
?>
      <div class="page-content">
          <div class="container">
            <div class="row">
                <div class="col-12">
                    <?php if (!empty($this->session->flashdata('success_msg'))) { ?>
                        <div class="alert alert-success text-center">
                              <?php echo $this->session->flashdata('success_msg');?>
                          </div>
                      <?php } ?>
                	<form action="<?php echo site_url(); ?>users/profile" class="card" id="add_user_form" enctype="multipart/form-data" method="post">
                    	<div class="card-header">
                        	<h3 class="card-title"><?php echo $mode;?> User</h3>
                        </div>
                        <div class="card-body">
                        	<div class="row">
                            <div class="col-md-4 col-lg-4">
                                <div class="form-group">
                                    <?php echo form_label('First Name', 'first_name', array('class' => 'form-label'));?>
                                    <?php echo form_input($first_name);?>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-4">
                                <div class="form-group">
                                    <?php echo form_label('Last Name', 'last_name', array('class' => 'form-label'));?>
                                    <?php echo form_input($last_name);?>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-4">
                                <div class="form-group">
                                    <?php echo form_label('Password', 'password', array('class' => 'form-label'));?>
                                    <?php echo form_input($password);?>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-4">                              
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
                                    <div style="width:100%;float:left;">
                                        <img src="<?php echo $imagePath;?>" id="user_avatar_upload" style="display:<?php echo ($imageCondition)?"block":"none";?>";  />
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                          <div class="d-flex">
                            <input type="submit" class="btn btn-primary ml-auto" value="<?php echo $mode;?> User">
                          </div>
                        </div>
                    </form>
                </div>
            </div>
           </div>
      </div>
<style>
.checkbox-label{
	margin-left: 10px;
}
</style>