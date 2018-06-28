<?php //echo "<pre>"; print_r($filters); print_r($numbers); echo "</pre>"; ?>
<div class="page">
      <div class="page-main">
          <div class="page-content">
              <div class="container">
                <div class="row row-cards row-deck update_series_wrapper" id="generated_numbers">
                <?php if(isset($numbers) && count($numbers)){?>
                    <div class="col-12">
                    <div class="card">
                      <div class="table-responsive">
                        <table class="table card-table table-vcenter text-nowrap">
                        <?php if(count($numbers) > 0 ){?>
                          <thead>
                            <tr>
                              <th class="w-1">No.</th>
                              <th style='width:20%;'>Total Numbers</th>
                              <th style='width:20%;'>Start Number</th>
                              <th style='width:20%;'>End Number</th>
                              <th style='width:20%;'>Assigned Date</th>
                              <th>Assigned By</th>
                              <th>Detail</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php
							$counter = 1;
							$token = "";
							//echo "<pre>"; print_r($numbers); echo "</pre>";
							foreach($numbers as $key  => $number){
								$token = $number["token"];
							echo "<tr>";
								echo "<td style='width:20%;'>".($key + 1)."</td>";
								echo "<td style='width:20%;'>".$number["total_numbers"]."</td>";
								echo "<td style='width:20%;'>0".$number["start_number"]."</td>";
								echo "<td style='width:20%;'>0".$number["end_number"]."</td>";?>
                                <td><?php echo date("d F, Y H:i", strtotime($number["date_assigned"]));?></td>
                                <td><?php echo $number["assigned_by_first_name"] . " ". $number["assigned_by_last_name"];?></td>
                                <td><a href="/teamlead-agent/view-assigned/<?php echo $number["token"]."/".strtotime($number["date_assigned"])."/".$assgined_by;?>/" class="update-btn">View</a></td>
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