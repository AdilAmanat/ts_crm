<div class="page">
      <div class="page-main">
          <div class="page-content">
              <div class="container">
              <div class="row">
                <div class="col-12">
                	<form class="card" id="user_apply_filters_form" method="get">
                    	<div class="card-body">
                	<div class="row">
                    	<div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Username', 'username', array('class' => 'form-label'));?>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?php echo (isset($filters["username"]) && $filters["username"] != "")?$filters["username"]:((isset($sale["username"]) && $sale["username"] != "")?$sale["username"]:"");?>"/>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Location', 'call_center', array('class' => 'form-label'));?>
                                <select name="call_center" id="call_center" class="form-control custom-select">
                                    <option value="">Please Select</option>
                                    <?php
									foreach($dropdowns['call_centers'] as $call_center){
										$sel = "";
										if(isset($filters["call_center"])){
											if(isset($filters["call_center"]) && $filters["call_center"] == $call_center["id"]){
												$sel = " selected='selected'";
											}
										}
									?>
									<option value="<?php echo $call_center["id"]?>"<?php echo $sel;?>><?php echo ucfirst($call_center["name"]);?></option>
									<?php
									}
									?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group">
                                <?php echo form_label('Privileges', 'privilege', array('class' => 'form-label'));?>
                                <select name="privilege" id="privilege" class="form-control custom-select">
                                    <option value="">Please Select</option>
                                    <?php
									foreach($dropdowns['user_types'] as $user_type){
										$sel = "";
										if(isset($filters["privilege"])){
											if(isset($filters["privilege"]) && $filters["privilege"] == $user_type["id"]){
												$sel = " selected='selected'";
											}
										}
									?>
									<option value="<?php echo $user_type["id"]?>"<?php echo $sel;?>><?php echo ucfirst($user_type["user_type"]);?></option>
									<?php
									}
									?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                        	<div class="form-group">
                            	<label for="" class="form-label">Filter</label>
                            	<button type="button" class="btn btn-primary" id="users_clear_filter">Clear Filter</button>
                                <button type="submit" class="btn btn-primary ml-auto" id="users_apply_filter">Apply Filter</button>
                            </div>
                        </div>
                        
                        </div></div>
                        
                        <?php /*?><div class="card-footer text-right">
                          <div class="d-flex">
                            <button type="button" class="btn btn-primary" id="users_clear_filter">Clear Filter</button>
                            <button type="submit" class="btn btn-primary ml-auto" id="users_apply_filter">Apply Filter</button>
                          </div>
                        </div><?php */?>
                    </form>
                </div>
              </div>
                <div class="row row-cards row-deck">
                    <div class="col-12">
                    <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">Users</h3>
                        <a href="/admin/users/add/" class="btn btn-primary ml-auto">Add User</a>
                      </div>
                      <div class="table-responsive">
                        <table class="table card-table table-vcenter text-nowrap">
                        <?php if(count($users) > 0 ){?>
                          <thead>
                            <tr>
                              <th class="w-1">No.</th>
                              <th>Username</th>
                              <th>First Name</th>
                              <th>Last Name</th>
                              <th>Active</th>
                              <th>Date Created</th>
                              <th>Login Count</th>
                              <th>Edit</th>
                              <th>Delete</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php
						  //echo "<pre>"; print_r($users); echo "</pre>";
						  foreach($users as $key => $user){?>
                            <tr>
                              <td><span class="text-muted"><?php echo ++$key;?></span></td>
                              <td><?php echo $user['username'];?></td>
                              <td><?php echo $user['first_name'];?></td>
                              <td><?php echo $user['last_name'];?></td>
                              <td>
							  <?php
								$is_active = "";
									if($user["is_active"] == 0){
										echo '<span class="status-icon bg-danger"></span> No';
									}
									else{
										echo '<span class="status-icon bg-success"></span> Yes';
									}
							  ?>
                              </td>
                              <td><?php echo date("Y-m-d", strtotime($user['date_added']));?></td>
                              <td><?php echo $user['total_login'];?></td>
                              <td>
                              <a href="<?php echo site_url(); ?>admin/users/edit/<?php echo $user['id'];?>" class="icon"><i class="fe fe-edit"></i></a>
                              </td>
                              <td>
                              <a href="#" data-url="<?php echo site_url(); ?>users/delete/<?php echo $user['id'];?>" class="del-user">X</a>
                              </td>
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