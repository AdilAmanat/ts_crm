<?php //echo "<pre>"; print_r($filters); print_r($numbers); echo "</pre>"; ?>
<div class="page">
      <div class="page-main">
          <div class="page-content">
              <div class="container">
                <div class="row row-cards row-deck update_series_wrapper" id="generated_numbers">
                <?php if(isset($telesales) && count($telesales)){?>
                    <div class="col-12">
                    <div class="card">
                      <div class="table-responsive">
                        <table class="table card-table table-vcenter text-nowrap">
                        <?php if(count($telesales) > 0 ){?>
                          <thead>
                            <tr>
                              <th class="w-1">No.</th>
                              <th style='width:20%;'>Assigned By</th>
                              <th style='width:20%;'>Assigned Date</th>
                              <th>Detail</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php
							$counter = 1;
							foreach($telesales as $key  => $telesale){
							echo "<tr>";
								echo "<td style='width:20%;'>".($key + 1)."</td>";
								?>
                                <td><?php echo $telesale["first_name"] . " ". $telesale["last_name"];?></td>
                                <td><?php echo date("d F, Y H:i", strtotime($telesale["date_updated"]));?></td>                          
                                <td><a href="/teamlead-agent/view-assigned-telesales/<?php echo $telesale["id"];?>/" class="update-btn">View</a></td>
                                <?php
							echo "</tr>";
						   }?>
                          
                          </tbody>
                         <?php }else{?>
                        <tr><td>No Records Found!</td></tr>
                        <?php }?>
                        </table>
                      </div>
                    </div>
                  </div>
                  <?php }?>
                </div>
              </div>
          </div>
      </div>