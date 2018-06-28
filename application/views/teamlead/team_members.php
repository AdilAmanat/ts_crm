<?php //echo "<pre>"; print_r($team_members); echo "</pre>";//exit; ?>
<div class="page">
      <div class="page-main">
          <div class="page-content">
              <div class="container">
                <div class="row row-cards row-deck update_series_wrapper" id="generated_numbers">
                    <div class="col-12">
                    <div class="card">
                      <div class="card-header">
                        <h3>Team Members</h3>
                      </div>
                      <div class="table-responsive">
                        <table class="table card-table table-vcenter text-nowrap">
                        <?php if(isset($team_members) && count($team_members)){?>
                          <thead>
                            <tr>
                              <th class="w-1">No.</th>
                              <th>First Name</th>
                              <th>Last Name</th>
                              <th>Assign Numbers</th>
                              <th>View Numbers</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php
						  foreach($team_members as $key  => $member){?>
                            <tr>
                              <td><span class="text-muted"><?php echo ++$key;?></span></td>
                              <td><?php echo ucfirst($member["first_name"]);?></td>
                              <td><?php echo ucfirst($member["last_name"]);?></td>
                              <td><?php echo ucfirst($member["total_numbers"]);?></td>
                              <td><a href='/teamlead/view-member-numbers/<?php echo $member["tsa_id"];?>'>View Numbers</a></td>
                            </tr>
                          <?php }?>
                          </tbody>
                         <?php }else{?>
                        <tr><td>No team member(s) has been assigned you yet.</td></tr>
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
        
        <?php if(isset($team_members) && count($team_members)){?>
            <div style="width:100%;margin-top:50px;" id="generated_numbers">
                <table cellspacing="0" cellpadding="0">
                	<thead>
                        <th style='width:20%;'>Sr. No.</th>
                        <th style='width:20%;'>First Name</th>
                        <th>Last Name</th>
                        <th>Assign Numbers</th>
                        <th>View Numbers</th>
                    </thead>
                    <tbody>
                    
						<?php
                        $counter = 1;
						//echo "<pre>"; print_r($numbers); echo "</pre>";
                        foreach($team_members as $key  => $member){
							echo "<tr>";
								echo "<td style='width:20%;'>".($key + 1)."</td>";
								echo "<td style='width:20%;'>".ucfirst($member["first_name"])."</td>";
								echo "<td>".ucfirst($member["last_name"])."</td>";
								echo "<td>".ucfirst($member["total_numbers"])."</td>";
								echo "<td><a href='/teamlead/view-member-numbers/".$member["tsa_id"]."' class='update-btn'>View Numbers</a></td>";
							echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        <?php }else{?>
        	<div style="width:100%;" id="generated_numbers">
                <table cellspacing="0" cellpadding="0">
                    <tr>
                        <td>No team member(s) has been assigned you yet.</td>
                    </tr>
                </table>
            </div>
        <?php }?>
            
    </div>
</div><?php */?>