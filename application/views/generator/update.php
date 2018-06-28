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

                      <div class="card-body">
                        <div class="row">
                          <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                              <label for="tl_telesales" class="form-label">TL Telesales</label>
                              <select name="tl_telesales" id="tl_telesales" class="form-control custom-select">
                                <option value="">Please Select</option>
                                <?php if(isset($tl_telesales)) { ?>
                                <?php foreach ($tl_telesales as $key => $value) { ?>
                                    <option value="<?php echo $value['id']; ?>"><?php echo $value['first_name'] . ' ' . $value['last_name']; ?></option>
                                <?php } ?>
                                <?php } ?>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="table-responsive">
                        <table class="table card-table table-vcenter text-nowrap">
                          <thead>
                            <tr>
                              <th class="w-1">No.</th>
                              <th>Number</th>
                              <th>Status</th>
                              <th>Comment</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php
						  foreach($numbers as $key => $num){?>
                            <tr class="tr-<?php echo $num["number"];?>">
                              <td><span class="text-muted"><?php echo ++$key;?></span></td>
                              <td class="number_td"><a href="tel:<?php echo $num["number"];?>"><?php echo $num["number"];?></a></td>
                              <td><select class="number_status form-control custom-select"><option value="">Please Select</option><option value="1">Valid</option><option value="0">Invalid</option></select></td>
                              <td><input type="text" maxlength="100" class="form-control comment" id="comment" name="comment" placeholder="Comment" value=""/></td>
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
<script>
	var token = '<?php echo $token;?>';
	$(document).ready(function(){
		$(".update_series").click(function(e){			
			
      if($("#tl_telesales").val() == "") {
        alert("Please select a Team Lead Telesales.");
        return;
      }

      var count = 0;
			$(".update_series_wrapper table select").each(function(){
				if($(this).val() != "")
					count++;
			});

			if(count == 0){
				alert("Please set status for at least 1 number.");
				return;
			}

			var counter = 1, total_records = $(".update_series_wrapper tbody tr").length, iteration = 0;
			// $(this).prop("disabled", true);
			var TableData = new Array();
			$(".update_series_wrapper tbody tr").each(function(index, element){
				if(total_records == (index - 1))return;
				
        if ($(".number_status", $(this)).val() != "") {
  				TableData[iteration] = {
  					"number" : $(".number_td a", $(this)).text(),
  					"back_office_status" : $(".number_status", $(this)).val(),
  					"gernerator_comment" : $(".comment", $(this)).val(),
  					"export_token" : token, 
            "assigned_to" : $("#tl_telesales").val()
  				}
				}

				if(counter == 10 || ((index + 1) == total_records)){
					var TableData1 = JSON.stringify(TableData);
					delete TableData;
					TableData = new Array();
					
					 $.ajax({
						type: "POST",
						url: "/generate/update_series/"+token,
						data: "pTableData=" + TableData1,
						success: function(rm_data){
              $(rm_data).hide('slow').remove();
						}
					});

					counter = 0 ;iteration = -1;
				}			
				counter++;
				iteration++;
				 
			});
			
		});
		
		/*$(document).ajaxStop(function() {
			$(".update_series_wrapper").remove();
			alert("series updated successfully");
		});*/
	});
</script>