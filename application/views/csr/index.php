<?php //echo "<pre>"; print_r($numbers); echo "</pre>";//exit;?>
<div class="page">
      <div class="page-main">
          <div class="page-content">
              <div class="container">
                <div class="row row-cards row-deck update_series_wrapper" id="generated_numbers">
                    <div class="col-12">
                    <div class="card">
                      <div class="card-header">
                        <h3>Assigned Series</h3>
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
                              <td><a href="/csr/update/<?php echo $num["token"]."/".strtotime($num["date_assigned"]);?>/" class="update-btn">View</a></td>
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