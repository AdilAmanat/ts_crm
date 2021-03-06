<div class="page">
      <div class="page-main">
          <div class="page-content">
              <div class="container">
              <?php if(count($numbers) > 0){?>
                <div class="row row-cards row-deck">
                    <div class="col-12">
                    <div class="card update_series_wrapper" id="generated_numbers">
                      <div class="card-header">
                        <h3 class="card-title">Update Series</h3>
                      </div>
                      <div class="table-responsive">
                        <table class="table card-table table-vcenter text-nowrap">
                          <thead>
                            <tr>
                              <th class="w-1">No.</th>
                              <th>Number</th>
                              <th>Status</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php
						  foreach($numbers as $key => $num){?>
                            <tr>
                              <td><span class="text-muted"><?php echo ++$key;?></span></td>
                              <td class="number_td"><a href="tel:<?php echo $num["number"];?>"><?php echo $num["number"];?></a></td>
                              <td><select class="number_status"><option value="">Please Select</option><option value="1">Valid</option><option value="0">Invalid</option></select></td>
                            </tr>
                          <?php }?>
                          </tbody>
                        </table>
                      </div>
                      <div class="card-footer text-right">
                  <div class="d-flex">
                    <button type="button" class="btn btn-primary ml-auto update_series">Update Series</button>
                  </div>
                </div>
                    </div>
                  </div>
                </div>
               <?php }?>
              </div>
          </div>
      </div>
      
      
      <?php /*?><div class="site-wrapper">
	<div class="main-wrappper">       
        <?php
		if(count($numbers) > 0){
		?>
            <div style="width:100%;" id="generated_numbers" class="update_series_wrapper">
            	<h3>Update Series</h3>
                    <table cellspacing="0" cellpadding="0" style="width:100%;">
                    	<th style='width:20%;'>Sr. No.</th>
                        <th>Number</th>
                        <th style='width:20%;'>Status</th>
                        
						<?php
                        foreach($numbers as $key => $num){
                            ?>
                        <tr>
                            <td style='width:20%;'><?php echo $key + 1;?></td>
                            <td class="number_td"><a href="tel:<?php echo $num["number"];?>"><?php echo $num["number"];?></a></td>
                            <td style='width:20%;'><select class="number_status"><option value="">Please Select</option><option value="1">Valid</option><option value="0">Invalid</option></select></td>
                        </tr>
                            <?php
                        }
							?>
                        <tr><td colspan="3"><input type="button" value="Update Series" class="update_series update-btn" style="float:right;margin-right:10px;"/></td></tr>
                    </table>
                </div>
        <?php
		}
		?>
    </div>
</div>
<style>
.custom-file-upload{
	margin-top: 17px;
    margin-right: 10px;
    float: left;
}
#filter-div-bottom{
	border:none !important;
}
</style><?php */?>
<script>
	var token = '<?php echo $token;?>';
	$(document).ready(function(){
		$(".update_series").click(function(e){			
			var count = 0;
			$(".update_series_wrapper table select").each(function(){
				if($(this).val() == "")
					count++;
			});
			console.log(count);
			if(count > 0){
				alert("Please set status for all numbers.");
				return;
			}

			var counter = 1, total_records = $(".update_series_wrapper tr").length, iteration = 0;
			$(this).prop("disabled", true);
			var TableData = new Array();
			$(".update_series_wrapper tr").each(function(index, element){
				if(total_records == (index - 1))return;
				console.log(index);
				TableData[iteration] = {
					"number" : 	     $(".number_td a", $(this)).text(),
					"back_office_status" : $(".number_status", $(this)).val(),
					"export_token" : token
				}
				
				if(counter == 10 || ((index + 1) == total_records)){
					var TableData1 = JSON.stringify(TableData);
					delete TableData;
					TableData = new Array();
					 $.ajax({
						type: "POST",
						url: "/back-office/update_series/"+token,
						data: "pTableData=" + TableData1,
						success: function(msg){
							//console.log(msg);
						}
					});
					counter = 0 ;iteration = -1;
				}			
				counter++;
				iteration++;
				 
			});
			
		});
		
		$(document).ajaxStop(function() {
			$(".update_series_wrapper").remove();
			alert("series updated successfully");
		});
	});
</script>