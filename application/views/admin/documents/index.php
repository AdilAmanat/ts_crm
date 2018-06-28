<div class="page">
  <div class="page-main">
      <div class="page-content">
          <div class="container">
            <div class="row row-cards row-deck">
                <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Documents</h3>
                    <a href="/admin/documents/add/" class="btn btn-primary ml-auto">Add Document</a>
                  </div>
                  <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap">
                    <?php if(count($documents) > 0 ){?>
                      <thead>
                        <tr>
                          <th class="w-1">No.</th>
                          <th>Document</th>
                          <th>Date Created</th>
                          <th>Edit</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                      foreach($documents as $key => $document){
                        ?>
                        <tr>
                          <td><span class="text-muted"><?php echo ++$key;?></span></td>
                          <td><?php echo $document['name'];?></td>
                          <td><?php echo  date("d F, Y", strtotime($document["date_added"]));?></td>
                        <td><a href="/admin/documents/edit/<?php echo $document['id'];?>" class="icon"><i class="fe fe-edit"></i></a></td>
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