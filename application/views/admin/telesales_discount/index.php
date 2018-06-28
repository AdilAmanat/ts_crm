<div class="page">
      <div class="page-main">
          <div class="page-content">
              <div class="container">
                <div class="row row-cards row-deck">
                    <div class="col-12">
                    <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">Telesales Discount</h3>
                        <a href="<?php echo site_url(); ?>admin/telesales-discount/add/" class="btn btn-primary ml-auto">Add Telesales Discount</a>
                      </div>
                      <div class="table-responsive">
                        <table class="table card-table table-vcenter text-nowrap">
                        <?php if(count($telesales_discount) > 0 ){?>
                          <thead>
                            <tr>
                              <th class="w-1">No.</th>
                              <th>Discount</th>
                              <th>Color</th>
                              <th>Active</th>
                              <th>Date Created</th>
                              <th>Edit</th>
                              </tr>
                          </thead>
                          <tbody>
                          <?php
						              foreach($telesales_discount as $key => $row){ ?>
                            <tr>
                              <td><span class="text-muted"><?php echo ++$key;?></span></td>
                              
                              <td><?php echo $row['discount']?></td>
                              <td><div class="selected-color" style="background:<?php echo $row['color'];?>;"></div></td>
                              <td><?php echo $yes_no_array[$row["is_active"]]; ?></td>
                              <td><?php echo  date("d F, Y", strtotime($row["date_added"]));?></td>
                              <td><a href="/admin/telesales-discount/edit/<?php echo $row['id'];?>" class="icon"><i class="fe fe-edit"></i></a></td>
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