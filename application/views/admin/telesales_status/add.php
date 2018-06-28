<?php
$status_input = array(
	"name" => "status",
	"id"   => "status",
	"type" => "text",
	"value" => (isset($_REQUEST["status"]))?$_REQUEST["status"]:(isset($status["status"])?$status["status"]:"")
);
$color = array(
	"name" => "color",
	"id"   => "color",
	"type" => "text",
	"value" => (isset($_REQUEST["color"]))?$_REQUEST["color"]:(isset($status["color"])?$status["color"]:"#0000ff"),
	"style" => "display:none;"
);
?>
<div class="page-content">
          <div class="container">
            <div class="row">
                <div class="col-12">
                	<form class="card" id="add_tsa_status_form" enctype="multipart/form-data" method="post">
                    	<div class="card-header">
                        	<h3 class="card-title"><?php echo $mode;?> Lead Status</h3>
                        </div>
                        <div class="card-body">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <?php echo form_label('Status', 'status', array('class' => 'form-label'));?>
                                    <?php echo form_input($status_input);?>
                                </div>
                                <div class="form-group">
                                    <label for="is_active" class="form-label">Is Active</label>
                                    <?php foreach ($yes_no_array as $key => $value) { ?>
                                            <?php echo $value; ?> <input type="radio" name="is_active" value="<?php echo $key; ?>" <?php echo (isset($status["is_active"]) && $key == $status["is_active"]) ? ' checked' : ''; ?>>
                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <?php echo form_label('Color', 'color', array('class' => 'form-label'));?>
                                   <div id="colorSelector"><div style="background-color: <?php echo $color["value"];?>"></div></div><?php echo form_input($color);?>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                          <div class="d-flex">
                            <button type="submit" class="btn btn-primary ml-auto add_tsa_status_submit" id="add_tsa_status_submit"><?php echo $mode;?> Lead Status</button>
                          </div>
                        </div>                        
                    </form>
                    <input type="hidden" value="<?php echo $mode;?>" id="mode" />
                </div>
            </div>
           </div>
      </div>