<div class="page">
      <div class="page-main">
          <div class="page-content">
              <div class="container">
                <div class="row row-cards row-deck">
                    <div class="col-12">
                    <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">Data Source</h3>
                        <a href="/admin/control-panel/data-source-add/" class="btn btn-primary ml-auto">Add Data Source</a>
                      </div>
                      <div class="table-responsive">
                        <table class="table card-table table-vcenter text-nowrap">
                        <?php if(count($data_sources) > 0 ){?>
                          <thead>
                            <tr>
                              <th class="w-1">No.</th>
                              <th>Handset</th>
                              <th>Date Created</th>
                              <th>Edit</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php
						  foreach($data_sources as $key => $data_source){
							?>
                            <tr>
                              <td><span class="text-muted"><?php echo ++$key;?></span></td>
                              <td><?php echo $data_source['source'];?></td>
                              <td><?php echo  date("d F, Y", strtotime($data_source["date_added"]));?></td>
                            <td><a href="/admin/control-panel/data-source-edit/<?php echo $data_source['id'];?>" class="icon"><i class="fe fe-edit"></i></a></td>
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