<div class="page">
  <div class="page-main">
      <div class="page-content">
          <div class="container">
            <div class="row row-cards row-deck">
                <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Lead Classifications</h3>
                    <a href="/admin/lead-classifications/add/" class="btn btn-primary ml-auto">Add Lead Classification</a>
                  </div>
                  <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap">
                    <?php if(count($classifications) > 0 ){?>
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
                      foreach($classifications as $key => $classification){
                        ?>
                        <tr>
                          <td><span class="text-muted"><?php echo ++$key;?></span></td>
                          <td><?php echo $classification['classification'];?></td>
                          <td><?php echo  date("d F, Y", strtotime($classification["date_added"]));?></td>
                        <td><a href="/admin/lead-classifications/edit/<?php echo $classification['id'];?>" class="icon"><i class="fe fe-edit"></i></a></td>
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
        <h1 class="top_heading">Lead Classification</h1><a href="/admin/lead-classifications/add/" class="update-btn heading-btn">Add Lead Classification</a>
        	<table id="datatable" cellpadding="0" cellspacing="0">
                                	<?php if(count($classifications) > 0 ){?>
                                    <thead>
                                    <tr>
                                        <th style="width:10%;">Sr. No.</th>
                                        <th>Name</th>
                                        <th>Date Created</th>
                                        <th>Edit</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php
										//echo "<pre>"; print_r($users); echo "</pre>";
										 foreach($classifications as $key => $classification){
										//1: admin, 2: number creator, 3: back office, 4: Teamlead, 5: telesales agent
											
										?>
                                            <tr>
                                                <td style="width:10%;"><?php echo ++$key;?></td>
                                                <td><?php echo $classification['classification']?></td>
                                                <td><?php echo  date("d F, Y", strtotime($classification["date_added"]));?></td>
                                                <td><a href="/admin/lead-classifications/edit/<?php echo $classification['id'];?>" class="update-btn">Edit</a></td>
                                                
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