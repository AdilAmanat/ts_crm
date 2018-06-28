<div class="page-content">
  <div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <?php if (!empty($this->session->flashdata('success_msg'))) { ?>
                    <div class="alert alert-success text-center">
                          <?php echo $this->session->flashdata('success_msg');?>
                    </div>
                  <?php } ?>
                <div class="card-header">
                    <h3 class="card-title"><?php echo $mode;?></h3>
                </div>
                <div class="card-body">
                    <?php if(isset($notifications['notifications']) && is_array($notifications['notifications']) && count($notifications['notifications'] > 0)) { ?>
                    <!-- <a href="#" class="dropdown-item d-flex">
                      <span class="avatar mr-3 align-self-center" style="background-image: url(demo/faces/male/41.jpg)"></span>
                      <div>
                        <strong>Nathan</strong> pushed new commit: Fix page load performance issue.
                        <div class="small text-muted">10 minutes ago</div>
                      </div>
                    </a> -->
                    <?php foreach($notifications['notifications'] as $key => $notification) { ?>
                    <?php echo $notification."<br><br>"; ?>
                    <?php } ?>
                <?php } else { ?>
                        No Notifications found!
                <?php } ?>
                </div>
            </div>
        </div>
    </div>
   </div>
</div>
<style>
.checkbox-label{
	margin-left: 10px;
}
</style>