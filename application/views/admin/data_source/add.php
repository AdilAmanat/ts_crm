<?php
$name = array(
	"name" => "source",
	"id"   => "source",
	"type" => "text",
	"value" => (isset($_REQUEST["source"]))?$_REQUEST["data_sources"]:(isset($data_sources["source"])?$data_sources["source"]:""),
	"required" => "required"
);
//echo "<pre>"; print_r($color); echo "</pre>";
?>

<div class="page-content">
          <div class="container">
            <div class="row">
                <div class="col-12">
                	<form class="card" id="add_handset_type_form" enctype="multipart/form-data" method="post">
                    	<div class="card-header">
                        	<h3 class="card-title"><?php echo $mode;?> Data Source</h3>
                        </div>
                        <div class="card-body">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <?php echo form_label('Data Source', 'source', array('class' => 'form-label'));?>
                                    <?php echo form_input($name);?>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                          <div class="d-flex">
                            <button type="submit" class="btn btn-primary ml-auto add_handset_type_submit" id="add_handset_type_submit"><?php echo $mode;?> Data Source</button>
                          </div>
                        </div>                        
                    </form>
                    <input type="hidden" value="<?php echo $mode;?>" id="mode" />
                </div>
            </div>
           </div>
      </div>