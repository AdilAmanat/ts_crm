<?php
$name_input = array(
	"name" => "classifications_name",
	"id"   => "classifications_name",
    "type" => "text",
	"required" => "required",
	"value" => (isset($_REQUEST["classifications_name"]))?$_REQUEST["classifications_name"]:(isset($package_classification["classifications_name"])?$package_classification["classifications_name"]:"")
);
?>
<div class="page-content">
  <div class="container">
    <div class="row">
        <div class="col-12">
        	<form action="<?php echo site_url(); ?>admin/package-classifications/<?php echo strtolower($mode); ?><?php echo (isset($id) && $id > 0) ? '/' . $id : ''; ?>" class="card" method="post">
            	<div class="card-header">
                	<h3 class="card-title"><?php echo $mode;?> Package Classification</h3>
                </div>
                <div class="card-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            <?php echo form_label('Package Classification', 'classifications_name', array('class' => 'form-label'));?>
                            <?php echo form_input($name_input);?>
                        </div>
                        <div class="form-group">
                            <label for="is_active" class="form-label">Is Active</label>
                            <?php foreach ($yes_no_array as $key => $value) { ?>
                                    <?php echo $value; ?> <input type="radio" name="is_active" value="<?php echo $key; ?>" <?php echo (isset($package_classification["is_active"]) && $key == $package_classification["is_active"]) ? ' checked' : ''; ?>>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                  <div class="d-flex">
                    <button type="submit" class="btn btn-primary ml-auto"><?php echo $mode;?> Package Classification</button>
                  </div>
                </div>                        
            </form>
            <input type="hidden" value="<?php echo $mode;?>" id="mode" />
        </div>
    </div>
   </div>
</div>