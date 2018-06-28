<div class="page">
      <div class="page-main">
          <div class="page-content">
              <div class="container">
                <div class="row row-cards row-deck">
                    <div class="col-12">
                    <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">View Daily Sale</h3>
                        <a href="<?php echo $_SERVER["HTTP_REFERER"];?>" class="btn btn-primary ml-auto">Back</a>
                        <a href="/admin/daily-sales/edit/<?php echo $sale["id"];?>" class="btn btn-primary ml-auto" style="margin-left: 10px !important;">Edit</a>
                      </div>
                      <div class="table-responsive">
                        <table class="table card-table table-vcenter text-nowrap">
                        <?php if(count($sale) > 0 ){?>
                          <thead>
                            <tr>
                              <th>Customer Name</th><td><?php echo $sale['customer_name'];?></td>
                            </tr>
                            <tr>
                              <th>Acquistion</th><td><?php echo $sale['acquistion'];?></td>
                            </tr>
                            <tr>
                              <th>Acquistion Name</th><td><?php echo $sale['acquistion_agent_first_name'] . " " . $sale['acquistion_agent_last_name'];?></td>
                            </tr>
                            <tr>
                              <th>Sales Manager</th><td><?php echo $sale['sales_manager_first_name'] . " " . $sale['sales_manager_last_name'];?></td>
                            </tr>
                            <tr>
                              <th>Team Leader</th><td><?php echo $sale['teamlead_first_name'] . " " . $sale['teamlead_last_name'];?></td>
                            </tr>
                            <tr>
                              <th>Activation Agent</th><td><?php echo $sale['activation_agent_first_name'] . " " . $sale['activation_agent_last_name'];?></td>
                            </tr>
                            <tr>
                              <th>Customer Name</th><td><?php echo $sale['sim_serial_no'];?></td>
                            </tr>
                            <tr>
                              <th>Directory No</th><td><?php echo $sale['directory_no'];?></td>
                            </tr>
                            <tr>
                              <th>Email</th><td><?php echo $sale['email'];?></td>
                            </tr>
                            <tr>
                              <th>Alternate No. (FNF)</th><td><?php echo $sale['alternate_no'];?></td>
                            </tr>
                            <tr>
                              <th>Alternative No. (Office/Land Line)</th><td><?php echo $sale['alternate_no_official_land'];?></td>
                            </tr>
                            <tr>
                              <th>Nationality</th><td><?php echo $sale['nationality'];?></td>
                            </tr>
                            <tr>
                              <th>City</th><td><?php echo $sale['city_name'];?></td>
                            </tr>
                            <tr>
                              <th>Plan Short</th><td><?php echo $sale['package_name'];?></td>
                            </tr>
                            <tr>
                              <th>Contract Duration</th><td><?php echo $sale['package_duration'];?></td>
                            </tr>
                            <tr>
                              <th>Add On (300+ Package) Name</th><td><?php echo $sale['package_description'];?></td>
                            </tr>
                            <tr>
                              <th>Package Classification</th><td><?php echo $sale['classifications_name'];?></td>
                            </tr>
                            <tr>
                              <th>Promo Device</th><td><?php echo $sale['promo_device_name'];?></td>
                            </tr>
                            <tr>
                              <th>Kiosk Paid Location</th><td><?php echo $sale['kiosk_name'];?></td>
                            </tr>
                            <tr>
                              <th>Alternative BO Date Approval</th><td><?php echo date("d F, Y", strtotime($sale["alternative_bo_date"]));?></td>
                            </tr>
                            <tr>
                              <th>Alternative BO Status Approved</th><td><?php echo $sale['alternative_bo_status'];?></td>
                            </tr>
                            <tr>
                              <th>Device Approval</th><td><?php echo ($sale['device_approval'] == "1")?"YES":(($sale['device_approval'] == "0")?"NO":"");?></td>
                            </tr>
                            <tr>
                              <th>Approved</th><td><?php echo ($sale['approved'] == "1")?"YES":(($sale['approved'] == "0")?"NO":"");?></td>
                            </tr>
                            <tr>
                              <th>Handset Type</th><td><?php echo $sale["handset_type_name"];?></td>
                            </tr>
                            <tr>
                              <th>Handset Model</th><td><?php echo $sale["handset_model_name"];?></td>
                            </tr>
                            <tr>
                              <th>Handset Color</th><td><?php echo $sale["handset_color_name"];?></td>
                            </tr>
                            <tr>
                              <th>Reference Number</th><td><?php echo $sale['reference_no'];?></td>
                            </tr>
                            <tr>
                              <th>Reference Number</th><td><?php echo $sale['reference_no'];?></td>
                            </tr>
                            <tr>
                              <th>Lead Classification</th><td><?php echo $sale['lead_classification_type'];?></td>
                            </tr>
                            <tr>
                              <th>Status</th><td><?php echo $sale['status'];?></td>
                            </tr>
                            <tr>
                              <th>OM ID</th><td><?php echo $sale['om_id'];?></td>
                            </tr>
                            <tr>
                              <th>Verification Status</th><td><?php echo ($sale['verification_status'] == "1")?"Verified":(($sale['verification_status'] == "0")?"Not Verified":"");?></td>
                            </tr>
                            <tr>
                              <th>Verification Remarks</th><td><?php echo $sale["verification_remarks"];?></td>
                            </tr>
                            <tr>
                              <th>CC Auto Payment</th><td><?php echo ($sale['auto_payment'] == "1")?"Yes":(($sale['auto_payment'] == "0")?"No":"");?></td>
                            </tr>
                            <tr>
                              <th>Company Name</th><td><?php echo $sale['company_name'];?></td>
                            </tr>
                            <tr>
                              <th>Designation</th><td><?php echo $sale['designation'];?></td>
                            </tr>
                            <tr>
                              <th>Business Card</th><td><?php echo ($sale['business_card'] == "1")?"Yes":(($sale['business_card'] == "0")?"No":"");?></td>
                            </tr>
                            <tr>
                              <th>Internal Discount</th><td><?php echo ($sale['internal_discount'] == "1")?"Yes":(($sale['internal_discount'] == "0")?"No":"");?></td>
                            </tr>
                            <tr>
                              <th>Documentation</th><td><?php echo $sale["document_name"];?></td>
                            </tr>
                            <tr>
                              <th>Extra Remarks</th><td><?php echo $sale["extra_remarks"];?></td>
                            </tr>
                            <tr>
                              <th>Documents</th><td>
							  <?php
							  if(count($sale["attachments"]) > 0){
                              foreach($sale["attachments"] as $document){
							  	?>
                                <a href="/uploads/daily_sales/<?php echo $document;?>" download><?php echo $document;?></a><br/>
                                <?php
							  }
                              }?></td>
                            </tr>
                            
                            
                            

                          </thead>
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