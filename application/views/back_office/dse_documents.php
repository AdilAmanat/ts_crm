<div class="page">
      <div class="page-main">
          <div class="page-content">
              <div class="container">
                <div class="row row-cards row-deck update_series_wrapper" id="generated_numbers">
                    <div class="col-12">
                    <div class="card">
                      <?php if (!empty($this->session->flashdata('success_msg'))) { ?>
                        <div class="alert alert-success text-center">
                              <?php echo $this->session->flashdata('success_msg');?>
                          </div>
                      <?php } ?>
                        <div class="card-header">
                            <h3><?php echo $c_page_title; ?></h3>
                        </div>
                      <div class="table-responsive">
                        <table class="table card-table table-vcenter text-nowrap">
                        <?php if(count($dse_documents) > 0 ){?>
                          <thead>
                            <tr>
                              <th class="w-1">Document ID</th>
                              <th>Batch ID</th>
                              <th>Title</th>
                              <th>Source DSE</th>
                              <th>Source TL DSE</th>
                              <th>Source ATL</th>
                              <th>Date Added</th>
                              <th>File</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php foreach($dse_documents as $key  => $document) { ?>
                            <?php 
                            $dse_user = $all_users_arr[$document['dse_user_id']];
                            $dse_tl_user = $all_users_arr[$document['dse_tl_user_id']];
                            $atl_user = $all_users_arr[$document['atl_user_id']];
                            $doc_file_url = site_url() . 'uploads/dse_documents/' . $document['document_file_name'];
                            ?>
            			     <tr id="row-<?php echo $document['dse_document_id']; ?>">
                                <td><?php echo $document['dse_document_id']; ?></td>
                                <td><?php echo $document['dse_document_batch_id']; ?></td>
                                <td><?php echo $document['title']; ?></td>
                                <td><?php echo $dse_user['first_name'] . ' ' . $dse_user['last_name']; ?></td>
                                <td><?php echo $dse_tl_user['first_name'] . ' ' . $dse_user['last_name']; ?></td>
                                <td><?php echo $atl_user['first_name'] . ' ' . $dse_user['last_name']; ?></td>
                                <td><?php echo date('d M Y G:i:s', strtotime($document['date_added'])); ?></td>
                                <td>
                                    <a href="<?php echo $doc_file_url; ?>" target="_blank">
                                        <img src="<?php echo $doc_file_url; ?>" class="dse_doc_img enlarge" title="Click to Enlarge" alt="document image">
                                    </a>
                                </td>
                                <td>
                                  <a href="#" id="dse-lg-form" class="btn btn-primary" data-assigned-by="<?php echo $document['dse_user_id']; ?>" data-form-action="<?php echo site_url() . 'back-office/add-dse-lead-by-document'; ?>">Open Form</a>
                                  <a href="#" class="aprv-dse-doc btn btn-info" data-id="<?php echo $document['dse_document_id']; ?>">Done</a>
                                </td>
                            </tr>
						  <?php } ?>
                          <tr><td colspan="100"></td></tr>
                          </tbody>
                         <?php } else { ?>
                                <tr><td>No Records Found!</td></tr>
                        <?php } ?>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
      </div>

<?php $this->load->view("telesale/templates/modal_lg_form.php"); ?>