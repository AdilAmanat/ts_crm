<?php
$classification = array(
	"name" => "classification",
	"id"   => "classification",
	"type" => "text",
	"value" => (isset($_REQUEST["classification"]))?$_REQUEST["classification"]:(isset($classifications["classification"])?$classifications["classification"]:"")
);
//echo "<pre>"; print_r($color); echo "</pre>";
?>
<div class="page-content">
  <div class="container">
    <div class="row">
        <div class="col-12">
            <form class="card" id="add_lead_classification_form" enctype="multipart/form-data" method="post">
                <div class="card-header">
                    <h3 class="card-title"><?php echo $mode;?> Lead Classification</h3>
                </div>
                <div class="card-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            <?php echo form_label('Classification', 'classification', array('class' => 'form-label'));?>
                            <?php echo form_input($classification);?>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                  <div class="d-flex">
                    <button type="submit" class="btn btn-primary ml-auto add_lead_classification_submit" id="add_lead_classification_submit"><?php echo $mode;?> Lead Classification</button>
                  </div>
                </div>                        
            </form>
            <input type="hidden" value="<?php echo $mode;?>" id="mode" />
        </div>
    </div>
   </div>
</div>