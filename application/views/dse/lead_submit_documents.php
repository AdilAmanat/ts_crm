<div class="page-content">
  <div class="container">

  	<div class="card">
  		<div class="card-header">
			<h3><?php echo $c_page_title; ?></h3>
		</div>
		<form action="<?php echo site_url('dse/add-lead-submit-documents'); ?>" method="post" enctype="multipart/form-data">
			<div class="submit-div documents">
				<?php if (!empty($this->session->flashdata('success_msg'))) { ?>
					<div class="alert alert-success text-center">
				        <?php echo $this->session->flashdata('success_msg');?>
				    </div>
				<?php } ?>
				<div class="row">
			  		<div class="col-sm-1"></div>
			  		<div class="col-sm-4">
			  			<label for="source_dse">Source DSE <span class="required">*</span></label>
                        <select name="source_dse" id="source_dse" class="form-control custom-select" required>
                            <option value="">Select DSE</option>
                            <?php
							foreach($dropdowns["dses"] as $dse) {
							?>
                            <option value="<?php echo $dse["id"];?>"><?php echo $dse["first_name"] ." " .$dse["last_name"];?></option>
                            <?php
							}
							?>
                        </select>
			  		</div>
			  		<div class="col-sm-3">
			  			<label for="source_tl_dse">Source TL DSE <span class="required">*</span></label>
                        <select name="source_tl_dse" id="source_tl_dse" class="form-control custom-select" required>
                            <option value="">Select TL SE</option>
                            <?php
							foreach($dropdowns["tl_dses"] as $tl_dse) {
							?>
                            <option value="<?php echo $tl_dse["id"];?>"><?php echo $tl_dse["first_name"] ." " .$tl_dse["last_name"];?></option>
                            <?php
							}
							?>
                        </select>
			  		</div>
			  		<div class="col-sm-3">
			  			<label for="source_atl">Source ATL <span class="required">*</span></label>
			  			<select name="source_atl" id="source_atl" class="form-control custom-select" required>
                            <option value="">Select ATL</option>
                            <?php
							foreach($dropdowns["atl"] as $atl) {
							?>
                            <option value="<?php echo $atl["id"];?>"><?php echo $atl["first_name"] ." " .$atl["last_name"];?></option>
                            <?php
							}
							?>
                        </select>
			  		</div>
			  	</div>
				<div class="row">
			  		<div class="col-sm-1"></div>
			  		<div class="col-sm-5">
			  			Signed Form
			  			<div class="custom-file">                            
                          <input type="file" name="images[]" class="custom-file-input" required>
		  				  <input type="hidden" name="doc_title[]" value="Signed Form">
                          <label class="custom-file-label">Choose file</label>
                        </div>
			  		</div>
			  		<div class="col-sm-5">
			  			Emirates ID
			  			<div class="custom-file">                            
                          <input type="file" name="images[]" class="custom-file-input" required>
		  				  <input type="hidden" name="doc_title[]" value="Emirates ID">
                          <label class="custom-file-label">Choose file</label>
                        </div>
			  		</div>
			  	</div>
			  	<div class="row">
			  		<div class="col-sm-1"></div>
			  		<div class="col-sm-5">
			  			Sim Copy
			  			<div class="custom-file">                            
                          <input type="file" name="images[]" class="custom-file-input" required>
		  				  <input type="hidden" name="doc_title[]" value="Sim Copy">
                          <label class="custom-file-label">Choose file</label>
                        </div>
			  		</div>
			  		<div class="col-sm-5">
			  			Forth Document
			  			<div class="custom-file">                            
                          <input type="file" name="images[]" class="custom-file-input" required>
		  				  <input type="hidden" name="doc_title[]" value="Forth Document">
                          <label class="custom-file-label">Choose file</label>
                        </div>
			  		</div>
			  	</div>
			  	<div class="row">
			  		<div class="col-sm-1"></div>
			  		<div class="col-sm-11">
			  			<small>* Only jpg, jpeg, png & gif file types are allowed.</small>
			  		</div>
			  	</div>
			  	<div class="row">
			  		<div class="col-sm-1"></div>
			  		<div class="col-sm-1">
			  			<input type="submit" name="documents_submit" value="Submit" class="btn btn-info">
			  		</div>
			  	</div>
			</div>
		</form>
	</div>
   </div>
</div>