<div class="page">
      <div class="page-main">
          <div class="page-content">
              <div class="container">
                <div class="row row-cards row-deck">
                    <div class="col-12">
                    <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">Packages</h3>
                        <a href="/admin/packages/add/" class="btn btn-primary ml-auto">Add Package</a>
                      </div>
                      <div class="table-responsive">
                        <table class="table card-table table-vcenter text-nowrap">
                        <?php if(count($packages) > 0 ){?>
                          <thead>
                            <tr>
                              <th class="w-1">No.</th>
                              <th>Name</th>
                              <th>Duration</th>
                              <th>Price</th>
                              <th>Description</th>
                              <th>Created By</th>
                              <th>Date Added</th>
                              <th>View</th>
                              <th>Edit</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php
						  $counter = 0;
						  foreach($packages as $key => $package){
						  $package_name = $package["package_name"];
						  $package_price = $package["package_price"];
						  $add_by = ucfirst($package["first_name"]) ." ".ucfirst($package["last_name"]);
						  $date_added = date("d F, Y", strtotime($package["date_added"]));			  
						  foreach($package["details"] as $detail){
						  	?>
                            <tr>
                            	<td><span class="text-muted"><?php echo ++$counter;?></span></td>
                                <td><?php echo $package_name;?></td>
                                <td><?php echo $detail['package_duration'];?></td>
                                <td><?php echo $package_price;?></td>
                                <td><?php echo (strlen($detail['package_description']) > 55) ? substr($detail['package_description'], 0, 55) . "..." : $detail['package_description'];?></td>
                                <td><?php echo $add_by;?></td>
                                <td><?php echo $date_added;?></td>
                                <td><a href="/admin/packages/view/<?php echo $package['id'];?>" class="icon"><i class="fe fe-eye"></i></a></td>
                                <td><a href="/admin/packages/edit/<?php echo $package['package_id'];?>" class="icon"><i class="fe fe-edit"></i></a></td>
                            </tr>
                            <?php
						  }
						  ?>
                          <?php }?>
                          </tbody>
                         <?php }else{?>
                        <tbody><tr><td colspan="8">No Records Found!</td></tr></tbody>
                        <?php }?>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
      </div>