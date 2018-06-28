<?php
//echo "<pre>"; print_r($detail); echo "</pre>";
//echo $status["color"]."<br>";
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
//echo "<pre>"; print_r($color); echo "</pre>";//#0000ff
?>
<div class="page-content">
          <div class="container">
            <div class="row">
                <div class="col-12">
                	<form class="card" id="add_csr_status_form" enctype="multipart/form-data" method="post">
                    	<div class="card-header">
                        	<h3 class="card-title"><?php echo $mode;?> CSR Status</h3>
                        </div>
                        <div class="card-body">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <?php echo form_label('Status', 'status', array('class' => 'form-label'));?>
                                    <?php echo form_input($status_input);?>
                                </div>
                                <div class="form-group">
                                    <?php echo form_label('Color', 'color', array('class' => 'form-label'));?>
                                   <div id="colorSelector"><div style="background-color: <?php echo $color["value"];?>"></div></div><?php echo form_input($color);?>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                          <div class="d-flex">
                            <button type="submit" class="btn btn-primary ml-auto add_csr_status_submit" id="add_csr_status_submit"><?php echo $mode;?> CSR Status</button>
                          </div>
                        </div>                        
                    </form>
                    <input type="hidden" value="<?php echo $mode;?>" id="mode" />
                </div>
            </div>
           </div>
      </div>