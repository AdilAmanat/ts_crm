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
                	<form class="card" id="add_tsa_status_form" enctype="multipart/form-data" method="post">
                    	<div class="card-header">
                        	<h3 class="card-title"><?php echo $mode;?> TSA Status</h3>
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
                            <button type="submit" class="btn btn-primary ml-auto add_tsa_status_submit" id="add_tsa_status_submit"><?php echo $mode;?> TSA Status</button>
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
    <h3><?php echo $mode;?> TSA Status</h3>
    	<?php $this->load->view("admin/menu.php");?>
        <div class="admin-content-wraper">
        
        	<div class="x_content"> <?php echo form_open("", array("id" => "add_tsa_status_form"));?>
        	<table id="datatable" cellpadding="0" cellspacing="0">
            	<tr>
                    <td><?php echo form_label('Status', 'status', array('class' => 'form-label'));?></td>
                    <td><?php echo form_input($status_input);?></td>
                </tr>
                <tr>
                    <td><?php echo form_label('Color', 'color', array('class' => 'form-label'));?></td>
                    <td><div id="colorSelector"><div style="background-color: <?php echo $color["value"];?>"></div></div><?php echo form_input($color);?></td>
                </tr>
                <tr>
                    <td colspan='2'><?php echo form_submit('add_tsa_status_submit', $mode.' Status', 'class="add_tsa_status_submit" id="add_tsa_status_submit"');?></td>
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