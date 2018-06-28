<?php
$user_data = $this->session->userdata('user_data');
if(in_array(1, $user_data['user_type'])){?>
    <div class="header-nav" id="headerMenuCollapse">
          <div class="container">
            <div class="row align-items-center">
              <div class="col">
                <ul class="nav nav-tabs">
                  <li class="nav-item">
                    <a href="javascript:void(0)" class="nav-link"><i class="fe fe-box"></i> Admin</a>
                    <div class="nav-submenu nav">
                      <a href="<?php echo site_url(); ?>admin/" class="nav-item ">Home</a>
                      <a href="<?php echo site_url(); ?>admin/users/" class="nav-item ">Users</a>
                      <a href="<?php echo site_url(); ?>admin/reports/" class="nav-item ">Reports</a>
                      <?php /*?><a href="/admin/telesales-management/" class="nav-item ">Telesales Management</a><?php */?>
                    </div>
                  </li>
                  <li class="nav-item">
                    <a href="javascript:void(0)" class="nav-link"><i class="fe fe-layers"></i> Data Entry</a>
                    <div class="nav-submenu nav">
                      <a href="<?php echo site_url(); ?>generate/" class="nav-item ">Home</a>
                      <a href="<?php echo site_url(); ?>generate/generate-series" class="nav-item ">Generate Numbers</a>
                      <a href="<?php echo site_url(); ?>generate/import-numbers-csv" class="nav-item ">Import Numbers</a>
                      <a href="<?php echo site_url(); ?>generate/validation" class="nav-item ">Validation</a>
                      <a href="<?php echo site_url(); ?>generate/history/" class="nav-item ">History</a>
                      <a href="<?php echo site_url(); ?>generate/reports/" class="nav-item ">Reports</a>
                    </div>
                  </li>
                  <li class="nav-item">
                    <a href="javascript:void(0)" class="nav-link"><i class="fe fe-square"></i> Back Office</a>
                    <div class="nav-submenu nav">
                      <a href="<?php echo site_url(); ?>back-office/" class="nav-item ">Home</a>
                      <a href="<?php echo site_url(); ?>back-office/daily-sales/" class="nav-item ">Daily Sales</a>
                      <a href="<?php echo site_url(); ?>back-office/closed-sales/" class="nav-item ">Closed Sales</a>
                      <a href="<?php echo site_url(); ?>back-office/reports/" class="nav-item ">Reports</a>
                      <a href="<?php echo site_url(); ?>back-office/dse-documents/" class="nav-item ">DSE Documents</a>
                    </div>
                  </li>
                  <li class="nav-item">
                    <a href="javascript:void(0)" class="nav-link"><i class="fe fe-calendar"></i> Manager</a>
                    <div class="nav-submenu nav">
                      <a href="<?php echo site_url(); ?>manager/" class="nav-item ">Home</a>
                      <a href="<?php echo site_url(); ?>manager/assign-leads" class="nav-item ">Assign Leads</a>
                      <a href="<?php echo site_url(); ?>manager/team-members/" class="nav-item ">Team Leader</a>
                      <a href="<?php echo site_url(); ?>manager/telesales/" class="nav-item ">Telesales</a>
                      <a href="<?php echo site_url(); ?>manager/reports/" class="nav-item ">Reports</a>
                    </div>
                  </li>
                  <li class="nav-item">
                    <a href="javascript:void(0)" class="nav-link"><i class="fe fe-calendar"></i> TL Telesales</a>
                    <div class="nav-submenu nav">
                      <a href="<?php echo site_url(); ?>teamlead-agent/" class="nav-item ">Home</a>
                      <a href="<?php echo site_url(); ?>teamlead-agent/assign-leads" class="nav-item ">Assign Leads</a>
                      <a href="<?php echo site_url(); ?>teamlead/assign-numbers-without-feedback-tl" class="nav-item ">Assign New Numbers</a>
                      <a href="<?php echo site_url(); ?>teamlead-agent/team-members/" class="nav-item ">Team Members</a>
                      <a href="<?php echo site_url(); ?>teamlead-agent/tsa-update/" class="nav-item ">TSA Update</a>
                      <a href="<?php echo site_url(); ?>teamlead-agent/teamlead-csr-update/" class="nav-item ">TL CSR Update</a>
                      <a href="<?php echo site_url(); ?>teamlead-agent/telesales/" class="nav-item ">Telesales</a>
                      <a href="<?php echo site_url(); ?>teamlead-agent/assigned-telesales/" class="nav-item ">Active Leads</a>
                      <a href="<?php echo site_url(); ?>teamlead-agent/reports/" class="nav-item ">Reports</a>
                    </div>
                  </li>
                  <li class="nav-item">
                    <a href="javascript:void(0)" class="nav-link"><i class="fe fe-file"></i> Telesales</a>
                    <?php /*?><a href="/telesale/" class="nav-link "><i class="fe fe-file"></i> Telesale</a><?php */?>
                    <div class="nav-submenu nav">
                      <a href="<?php echo site_url(); ?>telesale/" class="nav-item ">Home</a>
                      <a href="<?php echo site_url(); ?>teamlead-agent/assigned-telesales/" class="nav-item ">Active Leads</a>
                      <a href="<?php echo site_url(); ?>telesale/lead-generation/" class="nav-item ">Lead Generation</a>
                      <a href="<?php echo site_url(); ?>telesale/reports/" class="nav-item ">Reports</a>
                    </div>
                  </li>
                  <li class="nav-item">
                    <a href="javascript:void(0)" class="nav-link"><i class="fe fe-calendar"></i> TL CSR</a>
                    <div class="nav-submenu nav">
                      <a href="<?php echo site_url(); ?>teamlead-csr/" class="nav-item ">Home</a>
                      <a href="<?php echo site_url(); ?>teamlead-csr/assign-leads" class="nav-item ">Assign Leads</a>
                      <a href="<?php echo site_url(); ?>teamlead-csr/team-members/" class="nav-item ">Team Members</a>
                      <a href="<?php echo site_url(); ?>teamlead-csr/telesales/" class="nav-item ">Telesales</a>
                      <a href="<?php echo site_url(); ?>teamlead-csr/assigned-telesales/" class="nav-item ">Active Leads</a>
                      <a href="<?php echo site_url(); ?>teamlead-csr/tlagent-update/" class="nav-item ">TL Agent Update</a>
                      <a href="<?php echo site_url(); ?>teamlead-csr/csr-update/" class="nav-item ">CSR Update</a>
                      <a href="<?php echo site_url(); ?>teamlead-csr/reports/" class="nav-item ">Reports</a>
                    </div>
                  </li>
                  <li class="nav-item">
                    <a href="javascript:void(0)" class="nav-link"><i class="fe fe-file"></i> CSR</a>
                    <div class="nav-submenu nav">
                      <a href="<?php echo site_url(); ?>csr/" class="nav-item ">Home</a>
                      <?php /*<a href="<?php echo site_url(); ?>csr/assigned-leads" class="nav-item ">Assigned Numbers</a>*/ ?>
                      <a href="<?php echo site_url(); ?>csr/lead-generation/" class="nav-item ">Lead Generation</a>
                      <a href="<?php echo site_url(); ?>csr/assigned-telesales/" class="nav-item ">Active Leads</a>
                      <a href="<?php echo site_url(); ?>csr/reports/" class="nav-item ">Reports</a>
                    </div>
                  </li>
                  <li class="nav-item">
                    <a href="javascript:void(0)" class="nav-link"><i class="fe fe-calendar"></i> TL DSE</a>
                    <div class="nav-submenu nav">
                      <a href="<?php echo site_url(); ?>teamlead-csr/" class="nav-item ">Home</a>
                      <a href="<?php echo site_url(); ?>teamlead-csr/assign-leads" class="nav-item ">Assign Leads</a>
                      <a href="<?php echo site_url(); ?>teamlead-csr/team-members/" class="nav-item ">Team Members</a>
                      <a href="<?php echo site_url(); ?>teamlead-csr/telesales/" class="nav-item ">Telesales</a>
                      <a href="<?php echo site_url(); ?>teamlead-csr/assigned-telesales/" class="nav-item ">Active Leads</a>
                      <a href="<?php echo site_url(); ?>teamlead-csr/tlagent-update/" class="nav-item ">TL Agent Update</a>
                      <a href="<?php echo site_url(); ?>teamlead-csr/csr-update/" class="nav-item ">CSR Update</a>
                      <a href="<?php echo site_url(); ?>teamlead-csr/reports/" class="nav-item ">Reports</a>
                    </div>
                  </li>
                  <li class="nav-item">
                    <a href="javascript:void(0)" class="nav-link"><i class="fe fe-file"></i> DSE</a>
                    <div class="nav-submenu nav">
                      <a href="<?php echo site_url(); ?>csr/" class="nav-item ">Home</a>
                      <a href="<?php echo site_url(); ?>csr/reports/" class="nav-item ">Reports</a>
                      <a href="<?php echo site_url(); ?>dse/lead-submit-documents/" class="nav-item">Submit Documents</a>
                    </div>
                  </li>
                <li class="nav-item">
                    <a href="javascript:void(0)" class="nav-link"><i class="fe fe-sliders"></i> Control Panel</a>
                    <div class="nav-submenu nav">
                        <a href="<?php echo site_url(); ?>admin/manage-status/" class="nav-item ">Manage TSA status</a>
                        <a href="<?php echo site_url(); ?>admin/manage-csr-status/" class="nav-item ">Manage CSR Status</a>
                        <a href="<?php echo site_url(); ?>admin/handset-types/" class="nav-item ">Handset Type</a>
                        <a href="<?php echo site_url(); ?>admin/handset-models/" class="nav-item ">Handset Models</a>
                        <a href="<?php echo site_url(); ?>admin/handset-colors/" class="nav-item ">Handset Colors</a>
                        <a href="<?php echo site_url(); ?>admin/promo-devices/" class="nav-item ">Promo Devices</a>
                        <a href="<?php echo site_url(); ?>admin/lead_classifications/" class="nav-item ">Lead Classifications</a>
                        <a href="<?php echo site_url(); ?>admin/documents/" class="nav-item ">Documents</a>
                        <a href="<?php echo site_url(); ?>admin/call-centers/" class="nav-item ">Call Centers</a>
                        <?php /*?><a href="/admin/languages/" class="nav-item ">Languages</a><?php */?>
                        <a href="<?php echo site_url(); ?>admin/kiosks/" class="nav-item ">Kiosks</a>
                        <a href="<?php echo site_url(); ?>admin/packages/durations/" class="nav-item ">Package Durations</a>
                        <a href="<?php echo site_url(); ?>admin/control-panel/data-sources/" class="nav-item ">Data Sources</a>
                        <a href="<?php echo site_url(); ?>admin/packages/" class="nav-item ">Packages</a>
                        <a href="<?php echo site_url(); ?>admin/telesales-discount/" class="nav-item ">Telesales Discount</a>
                        <a href="<?php echo site_url(); ?>admin/telesales-status/" class="nav-item ">Lead Status</a>
                        <a href="<?php echo site_url(); ?>admin/package-classifications/" class="nav-item ">Package Classifications</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="<?php echo site_url(); ?>admin/reports/" class="nav-link "><i class="fe fe-book"></i> Reports</a>
                  </li>
                <li class="nav-item">
                    <a href="<?php echo site_url(); ?>targets/" class="nav-link "><i class="fe fe-book"></i> Targets</a>
                  </li>  
                </ul>
              </div>
              <?php /*?><div class="col-3 ml-auto">
                <form class="input-icon">
                  <input type="search" class="form-control header-search" placeholder="Search&hellip;" tabindex="1">
                  <div class="input-icon-addon">
                    <i class="fe fe-search"></i>
                  </div>
                </form>
              </div><?php */?>
            </div>
          </div>
        </div>
<?php }else{?>
    <div class="header-nav" id="headerMenuCollapse">
          <div class="container">
            <div class="row align-items-center">
              <div class="col">
                <ul class="nav nav-tabs">
                  <?php if(in_array(2, $user_data['user_type'])){?>
                  <li class="nav-item"><a href="<?php echo site_url(); ?>back-office/" class="nav-link"><i class="fe fe-square"></i> Home</a></li>
                  <li class="nav-item"><a href="<?php echo site_url(); ?>generate/generate-series/" class="nav-link"><i class="fe fe-layers"></i> Generate Numbers</a></li>
                  <li class="nav-item"><a href="<?php echo site_url(); ?>generate/import-numbers-csv/" class="nav-link"><i class="fe fe-layers"></i> Import Numbers</a></li>
                  <li class="nav-item"><a href="<?php echo site_url(); ?>generate/validation/" class="nav-link"><i class="fe fe-layers"></i> Validation</a></li>
                  <li class="nav-item"><a href="<?php echo site_url(); ?>generate/history/" class="nav-link"><i class="fe fe-layers"></i> History</a></li>
                  <li class="nav-item"><a href="<?php echo site_url(); ?>generate/reports/" class="nav-link"><i class="fe fe-book"></i> Reports</a></li>
          <?php }?>
                  <?php if(in_array(3, $user_data['user_type'])){?>
                  <li class="nav-item"><a href="<?php echo site_url(); ?>back-office/" class="nav-link"><i class="fe fe-square"></i> Home</a></li>
                  <li class="nav-item"><a href="<?php echo site_url(); ?>back-office/daily-sales/" class="nav-link"><i class="fe fe-layers"></i> Daily Sales</a></li>
                  <li class="nav-item"><a href="<?php echo site_url(); ?>back-office/closed-sales/" class="nav-link"><i class="fe fe-layers"></i> Closed Sales</a></li>
                  <li class="nav-item"><a href="<?php echo site_url(); ?>back-office/reports/" class="nav-link"><i class="fe fe-book"></i> Reports</a></li>
          <?php }?>
                  <?php if(in_array(9, $user_data['user_type'])){?>
                  <li class="nav-item"><a href="<?php echo site_url(); ?>manager/" class="nav-link"><i class="fe fe-square"></i> Home</a></li>
                  <li class="nav-item"><a href="<?php echo site_url(); ?>manager/assign-leads/" class="nav-link"><i class="fe fe-layers"></i> Assigned Numbers</a></li>
                  <li class="nav-item"><a href="<?php echo site_url(); ?>manager/team-members/" class="nav-link"><i class="fe fe-layers"></i> Team Leader</a></li>
                  <li class="nav-item"><a href="<?php echo site_url(); ?>csr/telesales/" class="nav-link"><i class="fe fe-layers"></i> Telesales</a></li>
                  <li class="nav-item"><a href="<?php echo site_url(); ?>manager/reports/" class="nav-link"><i class="fe fe-book"></i> Reports</a></li>
                  <li class="nav-item">
                   <a href="<?php echo site_url(); ?>targets/" class="nav-link "><i class="fe fe-book"></i> Targets</a>
                  </li>
          <?php }?>
                  <?php if(in_array(4, $user_data['user_type'])){?>
                  <li class="nav-item"><a href="<?php echo site_url(); ?>teamlead-agent/" class="nav-link"><i class="fe fe-square"></i> Home</a></li>
                  <li class="nav-item"><a href="<?php echo site_url(); ?>teamlead-agent/assign-leads/" class="nav-link"><i class="fe fe-layers"></i> Assign Leads</a></li>
                  <li class="nav-item"><a href="<?php echo site_url(); ?>teamlead/assign-numbers-without-feedback-tl" class="nav-link"><i class="fe fe-layers"></i> Assign Leads(BO)</a></li>
                  <li class="nav-item"><a href="<?php echo site_url(); ?>teamlead-agent/team-members/" class="nav-link"><i class="fe fe-book"></i> Team Members</a></li>
                  <li class="nav-item"><a href="<?php echo site_url(); ?>teamlead-agent/tsa-update/" class="nav-link"><i class="fe fe-book"></i> TSA Update</a></li>
                  <li class="nav-item"><a href="<?php echo site_url(); ?>teamlead-agent/teamlead-csr-update/" class="nav-link"><i class="fe fe-book"></i> TL CSR Update</a></li>
                  <li class="nav-item"><a href="<?php echo site_url(); ?>teamlead-agent/telesales/" class="nav-link"><i class="fe fe-book"></i> Telesales</a></li>
                  <li class="nav-item"><a href="<?php echo site_url(); ?>teamlead-agent/assigned-telesales/" class="nav-link"><i class="fe fe-book"></i> Active Leads</a></li>
                  <?php /*<li class="nav-item"><a href="<?php echo site_url(); ?>users/recent-leads/" class="nav-link"><i class="fe fe-book"></i> Recent Leads</a></li>*/?>
                  <li class="nav-item"><a href="<?php echo site_url(); ?>teamlead-agent/reports/" class="nav-link"><i class="fe fe-book"></i> Reports</a></li>
                  <li class="nav-item">
                   <a href="<?php echo site_url(); ?>targets/" class="nav-link "><i class="fe fe-book"></i> Targets</a>
                  </li>
          <?php }?>
                  <?php if(in_array(5, $user_data['user_type'])){?>
                  <li class="nav-item"><a href="<?php echo site_url(); ?>telesale/" class="nav-link"><i class="fe fe-square"></i> Home</a></li>
                  <li class="nav-item"><a href="<?php echo site_url(); ?>telesale/assigned-leads/" class="nav-link"><i class="fe fe-layers"></i> Assigned Numbers</a></li>
                  <li class="nav-item"><a href="<?php echo site_url(); ?>users/recent-leads/" class="nav-link"><i class="fe fe-book"></i> Recent Leads</a></li>
                  <li class="nav-item"><a href="<?php echo site_url(); ?>telesale/lead-generation/" class="nav-link"><i class="fe fe-book"></i> Lead Generation</a></li>
                  <li class="nav-item"><a href="<?php echo site_url(); ?>telesale/reports/" class="nav-link"><i class="fe fe-book"></i> Reports</a></li>
          <?php }?>
                  <?php if(in_array(10, $user_data['user_type'])){?>
                  <li class="nav-item"><a href="<?php echo site_url(); ?>teamlead-csr/" class="nav-link"><i class="fe fe-square"></i> Home</a></li>
                  <li class="nav-item"><a href="<?php echo site_url(); ?>teamlead-csr/assign-leads/" class="nav-link"><i class="fe fe-layers"></i> Assigned Numbers</a></li>
                  <li class="nav-item"><a href="<?php echo site_url(); ?>teamlead-csr/team-members/" class="nav-link"><i class="fe fe-book"></i> Team Members</a></li>
                  <li class="nav-item"><a href="<?php echo site_url(); ?>teamlead-csr/telesales/" class="nav-link"><i class="fe fe-book"></i> Telesales</a></li>
                  <li class="nav-item"><a href="<?php echo site_url(); ?>teamlead-csr/assigned-telesales/" class="nav-link"><i class="fe fe-book"></i> Active Leads</a></li>
                  <li class="nav-item"><a href="<?php echo site_url(); ?>users/recent-leads/" class="nav-link"><i class="fe fe-book"></i> Recent Leads</a></li>
                  <li class="nav-item"><a href="<?php echo site_url(); ?>teamlead-csr/tlagent-update/" class="nav-link"><i class="fe fe-book"></i> TL Agent Update</a></li>
                  <li class="nav-item"><a href="<?php echo site_url(); ?>teamlead-csr/csr-update/" class="nav-link"><i class="fe fe-book"></i> CSR Update</a></li>
                  <li class="nav-item"><a href="<?php echo site_url(); ?>teamlead-csr/reports/" class="nav-link"><i class="fe fe-book"></i> Reports</a></li>
          <?php }?>
                  <?php if(in_array(6, $user_data['user_type'])){?>
                  <li class="nav-item"><a href="<?php echo site_url(); ?>csr/" class="nav-link"><i class="fe fe-square"></i> Home</a></li>
                  <li class="nav-item"><a href="<?php echo site_url(); ?>csr/assigned-leads/" class="nav-link"><i class="fe fe-layers"></i> Assigned Numbers</a></li>
                  <li class="nav-item"><a href="<?php echo site_url(); ?>csr/assigned-telesales/" class="nav-link"><i class="fe fe-layers"></i> Active Leads</a></li>
                  <li class="nav-item"><a href="<?php echo site_url(); ?>users/recent-leads/" class="nav-link"><i class="fe fe-book"></i> Recent Leads</a></li>
                  <li class="nav-item"><a href="<?php echo site_url(); ?>csr/lead-generation/" class="nav-link"><i class="fe fe-layers"></i> Lead Generation</a></li>
                  <li class="nav-item"><a href="<?php echo site_url(); ?>csr/reports/" class="nav-link"><i class="fe fe-book"></i> Reports</a></li>
          <?php }?>
                  <?php if(in_array(11, $user_data['user_type'])){?>
                  <li class="nav-item">
                    <a href="javascript:void(0)" class="nav-link"><i class="fe fe-calendar"></i> TL DSE</a>
                  </li>
                  <li class="nav-item">  
                    <a href="<?php echo site_url(); ?>teamlead-csr/" class="nav-link">Home</a>
                  </li>
                  <li class="nav-item">  
                    <a href="<?php echo site_url(); ?>teamlead-csr/assign-leads" class="nav-link">Assign Leads</a>
                  </li>
                  <li class="nav-item">  
                      <a href="<?php echo site_url(); ?>teamlead-csr/team-members/" class="nav-link">Team Members</a>
                  </li>
                  <li class="nav-item">    
                      <a href="<?php echo site_url(); ?>teamlead-csr/telesales/" class="nav-link">Telesales</a>
                  </li>
                  <li class="nav-item">    
                      <a href="<?php echo site_url(); ?>teamlead-csr/assigned-telesales/" class="nav-link">Active Leads</a>
                  </li>    
                  <li class="nav-item">
                      <a href="<?php echo site_url(); ?>teamlead-csr/tlagent-update/" class="nav-link">TL Agent Update</a>
                  </li>
                  <li class="nav-item">    
                      <a href="<?php echo site_url(); ?>teamlead-csr/csr-update/" class="nav-link">CSR Update</a>
                  </li>
                  <li class="nav-item">    
                      <a href="<?php echo site_url(); ?>teamlead-csr/reports/" class="nav-link">Reports</a>
                  </li>
                  <li class="nav-item">
                   <a href="<?php echo site_url(); ?>targets/" class="nav-link"><i class="fe fe-book"></i> Targets</a>
                  </li>
          <?php }?>
                  
                  
                  <?php if(in_array(7, $user_data['user_type'])){?>
                  <li class="nav-item">
                    <a href="javascript:void(0)" class="nav-link"><i class="fe fe-file"></i> DSE</a>
                    <div class="nav-submenu nav">
                      <a href="<?php echo site_url(); ?>csr/reports/" class="nav-item ">Reports</a>
                      <a href="<?php echo site_url(); ?>dse/lead-submit-documents/" class="nav-item ">Submit Documents</a>
                    </div>
                  </li>
          <?php }?>

                <?php if(in_array(15, $user_data['user_type'])){?>
                  <li class="nav-item">
                   <a href="<?php echo site_url(); ?>targets/" class="nav-link "><i class="fe fe-book"></i> Targets</a>
                  </li>
          <?php }?>
                </ul>
              </div>
            </div>
          </div>
        </div>
<?php }?>
<?php /*?><?php
//echo $panel_open = $this->uri->segment(1);
$user_data = $this->session->userdata('user_data');
if($user_data){
  $panel_open = $this->uri->segment(1);
  if(strtolower($panel_open) == "admin")
    $panel_open = "Admin";
  if(strtolower($panel_open) == "back_office" || strtolower($panel_open) == "back-office")
    $panel_open = "Back Office";
  if(strtolower($panel_open) == "teamlead")
    $panel_open = "Teamlead";
  if(strtolower($panel_open) == "telesale")
    $panel_open = "Telesales Agent";
  if(strtolower($panel_open) == "generate")
    $panel_open = "Number Creation";
  if(strtolower($panel_open) == "csr")
    $panel_open = "CSR";
  
  ?>
    <ul class="top-menu">
        <li style="float:left;padding:10px;"><?php echo $panel_open;?> Panel</li>
        <li><a href="/users/logout/">Logout</a></li>
        <?php if(in_array(1, $user_data['user_type'])){?>
        <li class="dropdown">
            <a href="javascript:void(0)">Control Panel</a>
            <div class="dropdown-content">
                <a href="/admin/manage-status/">Manage TSA status</a>
                <a href="/admin/manage-csr-status/">Manage CSR Status</a>
                <a href="/admin/handset-types/">Handset Type</a>
                <a href="/admin/handset-models/">Handset Models</a>
                <a href="/admin/handset-colors/">Handset Colors</a>
                <a href="/admin/promo-devices/">Promo Devices</a>
                <a href="/admin/lead_classifications/">Lead Classifications</a>
                <a href="/admin/documents/">Documents</a>
                <a href="/admin/call-centers/">Call Centers</a>
                <a href="/admin/languages/">Languages</a>
                <a href="/admin/kiosks/">Kiosks</a>
            </div>
        </li>
        <?php }?>
        <?php if(in_array(6, $user_data['user_type'])){?><li><a href="/csr/">CSR</a></li><?php }?>
        <?php if(in_array(5, $user_data['user_type'])){?><li><a href="/telesale/">Telesale</a></li><?php }?>
        <?php if(in_array(4, $user_data['user_type'])){?>
          <li class="dropdown">
              <a href="javascript:void(0)">Teamlead</a>
                <div class="dropdown-content">
                  <a href="/teamlead/">Teamlead</a>
                  <a href="/teamlead/team-members/">Team Members</a>
                </div>
            </li>
    <?php }?>
        <?php if(in_array(3, $user_data['user_type'])){?><li><a href="/back-office/">Back Office</a></li><?php }?>
        <?php if(in_array(2, $user_data['user_type'])){?><li><a href="/generate/">Number Generate</a></li><?php }?>
        <?php if(in_array(1, $user_data['user_type'])){?><li><a href="/admin/">Admin</a></li><?php }?>
        <li><a href="/<?php echo $this->uri->segment(1);?>/">Home</a></li>
    </ul>
    <?php
}
?><?php */?>