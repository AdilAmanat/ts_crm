<div class="page">
  <div class="page-main">
      <div class="page-content">
          <div class="container">
            <div class="row row-cards row-deck">
                <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Call Centers</h3>
                    <a href="/admin/call-centers/add/" class="btn btn-primary ml-auto">Add Call Center</a>
                  </div>
                  <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap">
                    <?php if(count($call_centers) > 0 ){?>
                      <thead>
                        <tr>
                          <th class="w-1">No.</th>
                          <th>Name</th>
                          <th>Alies</th>
                          <th>Date Created</th>
                          <th>Edit</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                      foreach($call_centers as $key => $call_center){
                        ?>
                        <tr>
                          <td><span class="text-muted"><?php echo ++$key;?></span></td>
                          <td><?php echo $call_center['name'];?></td>
                          <td><?php echo $call_center['alies'];?></td>
                          <td><?php echo  date("d F, Y", strtotime($call_center["date_added"]));?></td>
                        <td><a href="/admin/call-centers/edit/<?php echo $call_center['id'];?>" class="icon"><i class="fe fe-edit"></i></a></td>
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