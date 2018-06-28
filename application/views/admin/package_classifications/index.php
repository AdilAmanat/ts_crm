<div class="page">
      <div class="page-main">
          <div class="page-content">
              <div class="container">
                <div class="row row-cards row-deck">
                    <div class="col-12">
                    <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">Package Classification</h3>
                        <a href="<?php echo site_url(); ?>admin/package-classifications/add/" class="btn btn-primary ml-auto">Add Package Classification</a>
                      </div>
                      <div class="table-responsive">
                        <table class="table card-table table-vcenter text-nowrap">
                        <?php if(count($package_classifications) > 0 ){?>
                          <thead>
                            <tr>
                              <th class="w-1">No.</th>
                              <th>Name</th>
                              <th>Active</th>
                              <th>Edit</th>
                              </tr>
                          </thead>
                          <tbody>
                          <?php
						              foreach($package_classifications as $key => $row){ ?>
                            <tr>
                              <td><span class="text-muted"><?php echo ++$key;?></span></td>
                              <td><?php echo $row['classifications_name']?></td>
                              <td><?php echo $yes_no_array[$row["is_active"]]; ?></td>
                              <td><a href="/admin/package-classifications/edit/<?php echo $row['id'];?>" class="icon"><i class="fe fe-edit"></i></a></td>
                            </tr>
                          <?php }?>
                          </tbody>
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