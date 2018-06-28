<div class="page">
      <div class="page-main">
          <div class="page-content">
              <div class="container">
                <div class="row row-cards row-deck">
                    <div class="col-12">
                    <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">CSR Status</h3>
                        <a href="/admin/manage-csr-status/add/" class="btn btn-primary ml-auto">Add CSR status</a>
                      </div>
                      <div class="table-responsive">
                        <table class="table card-table table-vcenter text-nowrap">
                        <?php if(count($status) > 0 ){?>
                          <thead>
                            <tr>
                              <th class="w-1">No.</th>
                              <th>Status</th>
                            <th>Color</th>
                            <th>Date Created</th>
                            <th>Edit</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php
						  foreach($status as $key => $row){ ?>
                            <tr>
                              <td><span class="text-muted"><?php echo ++$key;?></span></td>
                              
                              <td><?php echo $row['status']?></td>
                            <td><div class="selected-color" style="background:<?php echo $row['color'];?>;"></div></td>
                            <td><?php echo  date("d F, Y", strtotime($row["date_added"]));?></td>
                            <td><a href="/admin/manage-csr-status/edit/<?php echo $row['id'];?>" class="icon"><i class="fe fe-edit"></i></a></td>
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
      
      
      
      
      
      
<?php /*?><div class="site-wrapper">
	<div class="main-wrappper">
    	<?php $this->load->view("admin/menu.php");?>
        <div class="admin-content-wraper">
        <h1 class="top_heading">CSR Status</h1><a href="/admin/manage-csr-status/add/" class="update-btn heading-btn">Add CSR status</a>
        	<table id="datatable" cellpadding="0" cellspacing="0">
                                	<?php if(count($status) > 0 ){?>
                                    <thead>
                                    <tr>
                                        <th style="width:10%;">Sr. No.</th>
                                        <th>Status</th>
                                        <th>Color</th>
                                        <th>Date Created</th>
                                        <th>Edit</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php
										//echo "<pre>"; print_r($users); echo "</pre>";
										 foreach($status as $key => $row){ 
										//1: admin, 2: number creator, 3: back office, 4: Teamlead, 5: telesales agent
											
										?>
                                            <tr>
                                                <td style="width:10%;"><?php echo ++$key;?></td>
                                                <td><?php echo $row['status']?></td>
                                                <td><div class="selected-color" style="background:<?php echo $row['color'];?>;"></div></td>
                                                <td><?php echo  date("d F, Y", strtotime($row["date_added"]));?></td>
                                                <td><a href="/admin/manage-csr-status/edit/<?php echo $row['id'];?>" class="update-btn">Edit</a></td>
                                                
                                            </tr>
                                        <?php }?>

                                    </tbody>
                                    <?php }else{?>
                                    <tr><td>No Records Found!</td></tr>
                                    <?php }?>
                                </table>
        </div>
        <div class="clear"></div>
    </div>
</div>
<style>
#datatable td{
	border-bottom:#ccc thin solid;
	text-align:center;
}
</style><?php */?>