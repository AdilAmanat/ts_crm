<div class="page">
  <div class="page-main">
      <div class="page-content">
          <div class="container">
            <div class="row row-cards row-deck">
                <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Languages</h3>
                    <a href="/admin/handset-colors/add/" class="btn btn-primary ml-auto">Add Language</a>
                  </div>
                  <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap">
                    <?php if(count($languages) > 0 ){?>
                      <thead>
                        <tr>
                          <th class="w-1">No.</th>
                          <th>Language</th>
                          <th>Date Created</th>
                          <th>Edit</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                      foreach($languages as $key => $language){
                        ?>
                        <tr>
                          <td><span class="text-muted"><?php echo ++$key;?></span></td>
                          <td><?php echo $language['name'];?></td>
                          <td><?php echo  date("d F, Y", strtotime($language["date_added"]));?></td>
                        <td><a href="/admin/languages/edit/<?php echo $language['id'];?>" class="icon"><i class="fe fe-edit"></i></a></td>
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
        <h1 class="top_heading">Languages</h1><a href="/admin/languages/add/" class="update-btn heading-btn">Add Language</a>
        	<table id="datatable" cellpadding="0" cellspacing="0">
                                	<?php if(count($languages) > 0 ){?>
                                    <thead>
                                    <tr>
                                        <th style="width:10%;">Sr. No.</th>
                                        <th>Handset</th>
                                        <th>Date Created</th>
                                        <th>Edit</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php
										//echo "<pre>"; print_r($users); echo "</pre>";
										 foreach($languages as $key => $language){ 
										//1: admin, 2: number creator, 3: back office, 4: Teamlead, 5: telesales agent
											
										?>
                                            <tr>
                                                <td style="width:10%;"><?php echo ++$key;?></td>
                                                <td><?php echo $language['name']?></td>
                                                <td><?php echo  date("d F, Y", strtotime($language["date_added"]));?></td>
                                                <td><a href="/admin/languages/edit/<?php echo $language['id'];?>" class="update-btn">Edit</a></td>
                                                
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