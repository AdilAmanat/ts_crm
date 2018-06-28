<?php //echo "<pre>"; print_r($numbers); echo "</pre>";//exit;?>
<div class="page">
      <div class="page-main">
          <div class="page-content">
              <div class="container">
                <div class="row row-cards row-deck update_series_wrapper" id="generated_numbers">
                    <div class="col-12">
                    <div class="card">
                      <div class="card-header">
                        <h3>Assigned Numbers</h3>
                      </div>
                      <div class="table-responsive">
                        <table class="table card-table table-vcenter text-nowrap">
                        <?php if(isset($numbers) && count($numbers)){?>
                          <thead>
                            <tr>
                              <th class="w-1">No.</th>
                              <th>Number</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php
						  foreach($numbers as $key => $num){?>
                            <tr>
                              <td><span class="text-muted"><?php echo ++$key;?></span></td>
                              <td><a href="tel:<?php echo $num["number"];?>"><?php echo $num["number"];?></a></td>
                            </tr>
                          <?php }?>
                          </tbody>
                         <?php }else{?>
                        <tr><td>No number assigned yet.</td></tr>
                        <?php }?>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
      </div>
      
      
      
      
      
      
      
      
      
      
      
      
<?php /*?><div class="site-wrapper">
	<div class="main-wrappper">       
        <?php
		if(count($numbers) > 0){
		?>
            <div style="width:100%;" id="generated_numbers" class="update_series_wrapper">
            	<h3>Update Status</h3>
                    <table cellspacing="0" cellpadding="0" style="width:100%;">
                    	<th style='width:20%;'>Sr. No.</th>
                        <th style='width:20%;'>Number</th>
                        
						<?php
                        foreach($numbers as $key => $num){
                            ?>
                        <tr>
                            <td style='width:20%;'><?php echo $key + 1;?></td>
                            <td style='width:20%;'><a href="tel:<?php echo $num["number"];?>"><?php echo $num["number"];?></a></td>
                            
                        </tr>
                            <?php
                        }
							?>
                    </table>
                </div>
        <?php
		}else{
			?>
            <div style="width:100%;" id="generated_numbers">
                <table cellspacing="0" cellpadding="0" style="width:100%;">
                    <tr>
                        <td>No number assigned yet.</td>
                    </tr>
                </table>
            </div>
            <?php
		}
		?>
    </div>
</div><?php */?>