<?php
$name = array(
	"name" => "name",
	"id"   => "name",
	"type" => "text",
	"value" => (isset($_REQUEST["name"]))?$_REQUEST["name"]:(isset($kiosks["name"])?$kiosks["name"]:"")
);
//echo "<pre>"; print_r($color); echo "</pre>";
?>

<div class="page-content">
  <div class="container">
    <div class="row">
        <div class="col-12">
            <form class="card" id="add_kiosk_form" enctype="multipart/form-data" method="post">
                <div class="card-header">
                    <h3 class="card-title"><?php echo $mode;?> Kiosk</h3>
                </div>
                <div class="card-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            <?php echo form_label('Name', 'name', array('class' => 'form-label'));?>
                            <?php echo form_input($name);?>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                  <div class="d-flex">
                    <button type="submit" class="btn btn-primary ml-auto add_kiosk_submit" id="add_kiosk_submit"><?php echo $mode;?> Kiosk</button>
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
    <h3><?php echo $mode;?> Kiosk</h3>
    	<?php $this->load->view("admin/menu.php");?>
        <div class="admin-content-wraper">
        
        	<div class="x_content"> <?php echo form_open("", array("id" => "add_kiosk_form"));?>
        	<table id="datatable" cellpadding="0" cellspacing="0">
            	<tr>
                    <td><?php echo form_label('Name', 'name', array('class' => 'form-label'));?></td>
                    <td><?php echo form_input($name);?></td>
                </tr>
                <tr>
                    <td colspan='2'><?php echo form_submit('add_kiosk_submit', $mode.' Kiosk', 'class="add_kiosk_submit" id="add_kiosk_submit"');?></td>
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