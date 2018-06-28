<div class="page-content">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <?php if (!empty($this->session->flashdata('success_msg'))) { ?>
          <div class="alert alert-success text-center">
            <?php echo $this->session->flashdata('success_msg');?>
          </div>
        <?php } ?>
        <form class="card" action="<?php echo site_url(); ?>generate/upload-csv-numbers" enctype="multipart/form-data" method="post">
          <?php ?><div class="card-header">
            <h3 class="card-title">Import Numbers by CSV</h3>
            </div><?php ?>
            <div class="card-body">
             <div class="row">
               <div class="col-md-3 col-lg-3">
                 <div class="form-group">
                   <div class="form-label">Select CSV File</div>
                   <div class="custom-file">                            
                    <input type="file" class="custom-file-input" name="csv_file" required="required">
                    <label class="custom-file-label">Choose file</label>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-lg-3">
                <label class="form-label">Select Data Source</label>
                <select name="data_source" class="form-control custom-select" required="required">
                  <option value="">Please select Data Source</option>
                  <?php foreach($data_sources as $data_source){?>
                    <option value="<?php echo $data_source["id"]?>"><?php echo $data_source["source"]?></option>
                  <?php }?>
                </select>
              </div>
              <div class="col-md-3 col-lg-3">
                <div class="form-group">
                  <label for="tl_telesales" class="form-label">TL Telesales</label>
                  <select name="tl_telesales" id="tl_telesales" class="form-control custom-select" required="required">
                    <option value="">Please Select</option>
                    <?php if(isset($tl_telesales)) { ?>
                    <?php foreach ($tl_telesales as $key => $value) { ?>
                        <option value="<?php echo $value['id']; ?>"><?php echo $value['first_name'] . ' ' . $value['last_name']; ?></option>
                    <?php } ?>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <div class="col-md-3 col-lg-3">
                <div class="form-group">
                  <input type="submit" class="btn btn-primary" value="Import" style="float:left;margin-top: 26px;"/>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12"><a href="<?php echo site_url(); ?>assets/csv/csv_file_number_example.csv" download>Download Example CSV file</a></div>
            </div>
          </div>                        
        </form>
      </div>
    </div>      
  </div>
</div>