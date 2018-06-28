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
                        <?php if(isset($series) && count($series)){?>
                          <thead>
                            <tr>
                              <th class="w-1">No.</th>
                              <th>Total Numbers</th>
                              <th>Start Number</th>
                              <th>End Number</th>
                              <th>Date Added</th>
                              <th>Update</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php
						  foreach($series as $key => $num){?>
                            <tr>
                              <td><span class="text-muted"><?php echo ++$key;?></span></td>
                              <td><?php echo $num["total_numbers"];?></td>
                              <td>0<?php echo $num["start_number"];?></td>
                              <td>0<?php echo $num["end_number"];?></td>                            
                              <td><?php echo date("d F, Y", strtotime($num["date_assigned"]));?></td>
                              <td><a href="/telesale/update/<?php echo $num["token"]."/".strtotime($num["date_assigned"]);?>/" class="update-btn">View</a></td>
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
		//echo "<pre>"; print_r($series); echo "</pre>";
		if(isset($series) && count($series) > 0){
		?>
            <div style="width:100%;margin-top:50px;" id="generated_numbers">
            	<h3>Assigined Series</h3>
                    <table cellspacing="0" cellpadding="0" style="width:100%;">
                    	<th style='width:20%;'>Sr. No.</th>
                        <th>Total Numbers</th>
                        <th>Start Number</th>
                        <th>End Number</th>
                        <th>Date Added</th>
                        <th>Update</th>
                        
						<?php
                        foreach($series as $key => $num){
                            ?>
                        <tr>
                            <td style='width:20%;'><?php echo $key + 1;?></td>
                            <td style='width:20%;'><?php echo $num["total_numbers"];?></td>
                            <td style='width:20%;'>0<?php echo $num["start_number"];?></td>
                            <td style='width:20%;'>0<?php echo $num["end_number"];?></td>                            
                            <td><?php echo date("d F, Y", strtotime($num["date_added"]));?></td>
                            <td><a href="/telesale/update/<?php echo $num["export_token"];?>" class="update-btn">View</a></td>
                        </tr>
                            <?php
                        }
							?>
                        
                    </table>
                </div>
        <?php
		}
		?>
    </div>
</div><?php */?>