<div class="page">
  <div class="page-main">
      <div class="page-content">
          <div class="container">
            <div class="row row-cards row-deck">
                <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Kiosks</h3>
                    <a href="/admin/kiosks/add/" class="btn btn-primary ml-auto">Add Kiosk</a>
                  </div>
                  <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap">
                    <?php if(count($kiosks) > 0 ){?>
                      <thead>
                        <tr>
                          <th class="w-1">No.</th>
                          <th>Name</th>
                          <th>Date Created</th>
                          <th>Edit</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                      foreach($kiosks as $key => $kiosk){
                        ?>
                        <tr>
                          <td><span class="text-muted"><?php echo ++$key;?></span></td>
                          <td><?php echo $kiosk['name'];?></td>
                          <td><?php echo  date("d F, Y", strtotime($kiosk["date_added"]));?></td>
                        <td><a href="/admin/kiosks/edit/<?php echo $kiosk['id'];?>" class="icon"><i class="fe fe-edit"></i></a></td>
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