<?php
$name = array(
	"name" => "name",
	"id"   => "name",
	"type" => "text",
	"value" => (isset($_REQUEST["name"]))?$_REQUEST["name"]:(isset($call_centers["name"])?$call_centers["name"]:"")
);
$alies = array(
	"name" => "alies",
	"id"   => "alies",
	"type" => "text",
	"value" => (isset($_REQUEST["alies"]))?$_REQUEST["alies"]:(isset($call_centers["alies"])?$call_centers["alies"]:"")
);
//echo "<pre>"; print_r($color); echo "</pre>";
?>

<div class="page-content">
  <div class="container">
    <div class="row">
        <div class="col-12">
            <form class="card" id="add_call_center_form"  method="post">
                <div class="card-header">
                    <h3 class="card-title"><?php echo $mode;?> Call Center</h3>
                </div>
                <div class="card-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            <?php echo form_label('Name', 'name', array('class' => 'form-label'));?>
                            <?php echo form_input($name);?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <?php echo form_label('Alies', 'alies', array('class' => 'form-label'));?>
                            <?php echo form_input($alies);?>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                  <div class="d-flex">
                    <button type="submit" class="btn btn-primary ml-auto add_call_center_submit" id="add_call_center_submit"><?php echo $mode;?> Call Center</button>
                  </div>
                </div>                        
            </form>
            <input type="hidden" value="<?php echo $mode;?>" id="mode" />
        </div>
    </div>
   </div>
</div>