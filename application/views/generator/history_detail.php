<div class="page">
      <div class="page-main">
          <div class="page-content">
              <div class="container">
                <div class="row row-cards row-deck">
                    <div class="col-12">
                    <div class="card update_series_wrapper" id="generated_numbers">
                      <div class="card-header">
                        <h3 class="card-title">History Detail</h3>
                      </div>
                      <div class="table-responsive">
                        <table class="table card-table table-vcenter text-nowrap">
                        <?php if(count($history["numbers"]) > 0){?>
                          <thead>
                            <tr>
                              <th class="w-1">No.</th>
                              <th>Number</th>
                              <th>Status</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php
						  foreach($history["numbers"] as $key => $data){?>
                            <tr>
                              <td><span class="text-muted"><?php echo ++$key;?></span></td>
                              <td><?php echo $data["number"];?></td>
                              <td><?php echo $data["generated_status"];?></td>
                            </tr>
                          <?php }?>
                          </tbody>
                        <?php }else{?>
                        <tr>
                        	<td>No Records Found!</td>
                        </tr>
                        <?php }?>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
      </div>