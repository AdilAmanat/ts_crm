<div class="page">
      <div class="page-main">
          <div class="page-content">
              <div class="container">
                <div class="row row-cards row-deck">
                    <div class="col-12">
                    <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">Team Targets</h3>
                      </div>
                      <form method="post" id="select_tl_frm">
                        <div class="table-responsive">
                            <div class="row" style="padding: 20px 20px;">
                              <div class="col-md-3 col-lg-3">
                              <div class="form-group">
                                  <label for="call_status" class="form-label">Select Team</label> 
                                  <?php
                                    if(count($team_leads))
                                    {
                                  ?>             
                                    <select name="team_lead_type"  id="team_lead_drop" class="form-control custom-select team_lead_drop">
                                    <option value="">Please Select</option>
                                    <?php
                                      foreach ($team_leads as $id => $lead) {
                                    ?>
                                        <option value="<?php echo $lead['id'];?>"><?php echo $lead['user_type'];?> </option>
                                    <?php
                                      }
                                    ?>
                                  </select>
                                  <?php
                                    }
                                  ?>
                                  <input type="submit" id="frm_submit" name="submit" style="display: none;">
                                  </div>
                              </div>
                            </div>
                            <table class="table card-table table-vcenter text-nowrap">
                            <?php if(count($team_members) > 0 ){?>
                              <thead>
                                <tr>
                                  <th class="w-1">No.</th>
                                  <th>Username</th>
                                  <th>Set Target</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>
                              <?php
                              //echo "<pre>"; print_r($users); echo "</pre>";
                              foreach($team_members as $key => $user){
                                ?>
                                <tr>
                                  <td><span class="text-muted"><?php echo ++$key;?></span></td>
                                  <td><?php echo $user['username'];?><input type="hidden" class="user_id" name="user_id[]" value="<?php echo $user['id']?>"></td>
                                  <td><input type="text" name="target" style="width: 50% !important;" class="form-control target" placeholder="Set Target" value="<?php echo (!empty($user['target_value'])?$user['target_value']:"");?>"></td>
                                    <td><a href="/admin/targets/add" class="btn btn-primary ml-auto set_target" id="set_target" data-update="<?php echo (!empty($user['target_value'])?"1":"0");?>">Set Targets</a></td>
                                  </td>
                                </tr>
                              <?php }?>
                              </tbody>
                             <?php }else{?>
                            <tr><td colspan="8">No Records Found!</td></tr>
                            <?php }?>
                            </table>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
          </div>
      </div>
<script type="text/javascript">
  $(".team_lead_drop").on("change",function(){
    var tl_id = $(this).val();
    $("#frm_submit").trigger("click");
  });
  $(".set_target").click(function(e){
    e.preventDefault();
    var is_update = $(this).data('update');
    var user_id = $(this).parents("tr").find(" td > .user_id").val();
    var target = $(this).parents("tr").find(" td > .target").val();
    var data = {target:target,user_id:user_id};
    method = "";
    if(is_update == 1)
    {
      method = "update";
    }
    else
    {
      method = "add";
    }
    $.ajax({
      url:"/targets/"+method,
      method:"post",
      data:data,
      success:function(res){
        if(res == 1)
        {
          alert("Target Added Successfully");
        }
      }
    });
  });
</script>