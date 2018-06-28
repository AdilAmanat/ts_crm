<div class="page-content">
  <div class="container">

  	<div class="card">
  		<div class="card-header">
			<h3><?php echo $c_page_title; ?></h3>
		</div>
		<form action="#" method="post" enctype="multipart/form-data">
			<div class="submit-div">
				<div class="row">
			  		<div class="col-sm-1"></div>
			  		<div class="col-sm-5">
			  			<span class="btn btn-info btn-lg">Emirates ID</span>
			  			<input type="file" name="documents[]">
			  		</div>
			  		<div class="col-sm-5">
			  			<span class="btn btn-info btn-lg">Signed Form</span>
			  			<input type="file" name="documents[]">
			  		</div>
			  	</div>
			  	<div class="row">
			  		<div class="col-sm-1"></div>
			  		<div class="col-sm-5">
			  			<span class="btn btn-info btn-lg">Sim Copy</span>
			  			<input type="file" name="documents[]">
			  		</div>
			  		<div class="col-sm-5">
			  			<span class="btn btn-info btn-lg">Forth Document</span>
			  			<input type="file" name="documents[]">
			  		</div>
			  	</div>
			  	<div class="row">
			  		<div class="col-sm-1"></div>
			  		<div class="col-sm-1">
			  			<input type="submit" name="documents_submit" value="Submit" class="btn btn-primary">
			  		</div>
			  	</div>
			</div>
		</form>
	</div>
   </div>
</div>