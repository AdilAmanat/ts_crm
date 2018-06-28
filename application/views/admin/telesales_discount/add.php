<?php
$status_input = array(
	"name" => "discount",
	"id"   => "discount",
    "type" => "text",
	"required" => "required",
	"value" => (isset($_REQUEST["discount"]))?$_REQUEST["discount"]:(isset($discount["discount"])?$discount["discount"]:"")
);
$color = array(
	"name" => "color",
	"id"   => "color",
	"type" => "text",
	"value" => (isset($_REQUEST["color"]))?$_REQUEST["color"]:(isset($discount["color"])?$discount["color"]:"#0000ff"),
	"style" => "display:none;"
);
?>
<div class="page-content">
  <div class="container">
    <div class="row">
        <div class="col-12">
        	<form action="<?php echo site_url(); ?>admin/telesales-discount/<?php echo strtolower($mode); ?><?php echo (isset($id) && $id > 0) ? '/' . $id : ''; ?>" class="card" method="post">
            	<div class="card-header">
                	<h3 class="card-title"><?php echo $mode;?> Telesales Discount</h3>
                </div>
                <div class="card-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            <?php echo form_label('Discount', 'discount', array('class' => 'form-label'));?>
                            <?php echo form_input($status_input);?>
                        </div>
                        <div class="form-group">
                            <label for="is_active" class="form-label">Is Active</label>
                            <?php foreach ($yes_no_array as $key => $value) { ?>
                                    <?php echo $value; ?> <input type="radio" name="is_active" value="<?php echo $key; ?>" <?php echo (isset($discount["is_active"]) && $key == $discount["is_active"]) ? ' checked' : ''; ?>>
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
                    <button type="submit" class="btn btn-primary ml-auto"><?php echo $mode;?> Telesales Discount</button>
                  </div>
                </div>                        
            </form>
            <input type="hidden" value="<?php echo $mode;?>" id="mode" />
        </div>
    </div>
   </div>
</div>