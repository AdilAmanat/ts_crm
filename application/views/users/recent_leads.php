<div class="page">
  <div class="page-main">
    <div class="page-content">
      <div class="container">
        <div class="row row-cards row-deck update_series_wrapper" id="generated_numbers">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3>Recent Leads</h3>
              </div>
              <div class="table-responsive">
                <table class="table card-table table-vcenter text-nowrap">
                  <?php if(isset($series) && count($series)){?>
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
                      foreach($series as $key => $telesale){?>
                        <tr>
                          <td style="width:20%;"><span class="text-muted"><?php echo ++$key;?></span></td>
                          <td><?php echo $telesale["first_name"] . " ". $telesale["last_name"];?></td>
                          <td><?php echo date("d F, Y H:i", strtotime($telesale["date_updated"]));?></td>
                          <td><a href="/users/view-assigned-telesales/<?php echo $telesale["id"];?>/" class="update-btn">View</a></td>
                        </tr>
                      <?php }?>
                    </tbody>
                  <?php }else{?>
                    <tr><td>No recent leads.</td></tr>
                  <?php }?>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>