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
                              <th style='width:20%;'>Number</th>
                              <th style='width:20%;'>Assigned By</th>
                              <th style='width:20%;'>Assigned Date</th>
                              <th style='width:20%;'>Comment</th>
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
								echo "<td style='width:20%;'>".$number["number"]."</td>";?>
                                <td><?php echo $number["assigned_by_first_name"] . " ". $number["assigned_by_last_name"];?></td>
                                <td><?php echo date("d F, Y H:i", strtotime($number["date_assigned"]));?></td>
                                <td><?php echo $number["comment"];?></td>
                                
                                <td><a href="/teamlead-csr/view-assigned-detail/<?php echo $number["number_id"]."/".$number["id"];?>/" class="update-btn">View</a></td>
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