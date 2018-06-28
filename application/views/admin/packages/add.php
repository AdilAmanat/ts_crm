<?php
//echo "<pre>"; print_r($detail); echo "</pre>";
$package_name = array(
	"name" => "package_name",
	"id"   => "package_name",
	"type" => "text",
	"value" => (isset($_REQUEST["package_name"]))?$_REQUEST["package_name"]:(isset($detail["package_name"])?$detail["package_name"]:""),
	"class" => "form-control",
	"required" => "required",
	"maxlength" => "50"
);
$package_price = array(
	"name" => "package_price",
	"id"   => "package_price",
	"type" => "text",
	"value" => (isset($_REQUEST["package_price"]))?$_REQUEST["package_price"]:(isset($detail["package_price"])?$detail["package_price"]:""),
	"class" => "form-control",
	"required" => "required"
);
$package_duration = array(
	"name" => "package_duration[]",
	"id"   => "package_duration",
	"type" => "text",
	"value" => (isset($_REQUEST["package_duration"]))?$_REQUEST["package_duration"]:(isset($detail["package_duration"])?$detail["package_duration"]:""),
	"class" => "form-control",
	"required" => "required"
);
$package_description = array(
	"name" => "package_description[]",
	"id"   => "package_description",
	"value" => (isset($_REQUEST["package_description"]))?$_REQUEST["package_description"]:(isset($detail["package_description"])?$detail["package_description"]:""),
	"class" => "form-control package_description",
	"required" => "required",
	"maxlength" => "250"
);

?>
      <div class="page-content">
          <div class="container">
            <div class="row">
                <div class="col-12">
                	<form class="card" id="add_package_form" method="post">
                    	<div class="card-header">
                        	<h3 class="card-title"><?php echo $mode;?> Package</h3>
                        </div>
                        <div class="card-body">
                            <div class="col-md-6 append-to-wrapper">
                                <div class="form-group">
                                    <?php echo form_label('Name', 'package_name', array('class' => 'form-label'));?>
                                    <?php echo form_input($package_name);?><span class="counter" style="right:-24px;top:28px;"></span>
                                </div>
                                <div class="form-group">
                                    <?php echo form_label('Price', 'package_price', array('class' => 'form-label'));?>
                                    <?php echo form_input($package_price);?>
                                </div>
                                <div class="form-group">
                                    <?php echo form_label('Duration', 'package_duration', array('class' => 'form-label'));?>
                                    <?php //echo form_input($package_duration);?>
                                	<select name="package_duration[]" id="package_duration" class="form-control custom-select">
                                        <option value="">Please select</option>
                                        <?php
                                        $val = (isset($_REQUEST["package_duration"]))?$_REQUEST["package_duration"]:(isset($detail["package_duration"])?$detail["package_duration"]:"");
                                        foreach($durations as $duration){
                                        ?>
                                        <option value="<?php echo $duration["duration"];?>" <?php echo ($val == $duration["duration"])?'selected="selected"':"";?>><?php echo ucfirst($duration["duration"]);?></option>
                                        <?php
                                        }
                                        ?>                           
                                    </select>
                                </div>
                                <div class="form-group" style="position:relative;">
                                    <?php echo form_label('Description', 'package_description', array('class' => 'form-label'));?>
                                    <?php echo form_textarea($package_description);?><span class="counter"></span>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                          <div class="d-flex">
                          	<button type="button" class="btn btn-primary add-more">Add More</button>
                            <button type="submit" class="btn btn-primary ml-auto add_package_submit" id="add_package_submit"><?php echo $mode;?> Package</button>
                          </div>
                        </div>
                        
                    </form>
                    <input type="hidden" value="<?php echo $mode;?>" id="mode" />
                </div>
            </div>
           </div>
      </div>
<div class="append-empty-fields" style="display:none;">
    <div class="form-group">
        <label for="package_duration" class="form-label">Duration</label>
        <select name="package_duration[]" id="package_duration" class="form-control custom-select">
            <option value="">Please select</option>
            <?php
            foreach($durations as $duration){
            ?>
            <option value="<?php echo $duration["duration"];?>"><?php echo ucfirst($duration["duration"]);?></option>
            <?php
            }
            ?>                           
        </select>
    </div>
    <div class="form-group" style="position:relative;">
        <label for="package_description" class="form-label">Description</label>
        <textarea name="package_description[]" maxlength="250" cols="40" rows="10" id="package_description" class="form-control package_description" required="required"></textarea><span class="counter">250</span>
    </div>
    <div class="form-group">
    	<button type="button" class="btn btn-primary remove-more">Remove</button>
    </div>
</div>
<style>
	.counter{
		float: left;
    	border: thin solid #ccc;
    	padding: 5px;
    	border-radius: 5px;
		position: absolute;
    	top: 26px;
    	right: -36px;
    	width: 36px;
	}
</style>