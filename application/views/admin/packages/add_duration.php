<?php
$duration = array(
	"name" => "duration",
	"id"   => "duration",
	"type" => "text",
	"value" => (isset($_REQUEST["duration"]))?$_REQUEST["duration"]:(isset($duration["duration"])?$duration["duration"]:""),
	"required" => "required"
);
//echo "<pre>"; print_r($color); echo "</pre>";
?>

<div class="page-content">
  <div class="container">
    <div class="row">
        <div class="col-12">
            <form class="card" id="add_call_center_form"  method="post">
                <div class="card-header">
                    <h3 class="card-title"><?php echo $mode;?> Package Durtation</h3>
                </div>
                <div class="card-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            <?php echo form_label('Duration', 'duration', array('class' => 'form-label'));?>
                            <?php echo form_input($duration);?>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                  <div class="d-flex">
                    <button type="submit" class="btn btn-primary ml-auto add_call_center_submit" id="add_call_center_submit"><?php echo $mode;?> Package Durtation</button>
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
    <h3><?php echo $mode;?> Package Durtation</h3>
    	<?php $this->load->view("admin/menu.php");?>
        <div class="admin-content-wraper">
        
        	<div class="x_content"> <?php echo form_open("", array("id" => "add_call_center_form"));?>
        	<table id="datatable" cellpadding="0" cellspacing="0">
            	<tr>
                    <td><?php echo form_label('duration', 'duration', array('class' => 'form-label'));?></td>
                    <td><?php echo form_input($duration);?></td>
                </tr>
                <tr>
                    <td colspan='2'><?php echo form_submit('add_call_center_submit', $mode.' Package Durtation', 'class="add_call_center_submit" id="add_call_center_submit"');?></td>
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