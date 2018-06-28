<?php
$package_name = $package["package_name"];
$package_price = $package["package_price"];
$add_by = ucfirst($package["first_name"]) ." ".ucfirst($package["last_name"]);
$date_added = date("d F, Y", strtotime($package["date_added"]));

?>
<div class="page">
      <div class="page-main">
          <div class="page-content">
              <div class="container">
                <div class="row row-cards row-deck">
                    <div class="col-12">
                    <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">View Package <?php echo ucwords($package_name);?></h3>
                        <a href="/admin/packages/edit/<?php echo $package["id"];?>" class="btn btn-primary ml-auto">Edit</a>
                      </div>
                      <div class="table-responsive">
                        <table class="table card-table table-vcenter text-nowrap">
                        <?php if(count($package) > 0 ){
						?>
                          <thead>
                            <tr>
                              <th>Package Name</th><td><?php echo $package_name;?></td>
                            </tr>
                            <tr>
                              <th>Package Price</th><td><?php echo $package_price;?></td>
                            </tr>
                            <?php
							foreach($package["details"] as $detail){
						  	?>
                            <tr>
                              <th>Duration</th><td><?php echo $detail['package_duration'];?></td>
                            </tr>
                            <tr>
                              <th>Description</th><td><?php echo $detail['package_description'];?></td>
                            </tr>
                            <?php
							}
							?>
                            <tr>
                              <th>Created By</th><td><?php echo $add_by;?></td>
                            </tr>
                            <tr>
                              <th>Date Added</th><td><?php echo $date_added;?></td>
                            </tr>
                         </thead>
                         <?php }else{?>
                        <tr><td colspan="8">No Records Found!</td></tr>
                        <?php }?>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
      </div>