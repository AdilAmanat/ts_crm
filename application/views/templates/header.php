<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Language" content="en" />
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="theme-color" content="#4188c9">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <link rel="icon" href="/favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" />
    <!-- Generated: 2018-03-27 13:25:03 +0200 -->
    <title>Al Wafiq CRM</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
    
    <script type="text/javascript">
        var site_url  = '<?php echo site_url(); ?>';
    </script>

    <script src="<?php echo site_url(); ?>js/jquery-2.2.2.min.js"></script>
    <script src="<?php echo site_url(); ?>assets/js/vendors/bootstrap.bundle.min.js"></script>
    <script src="<?php echo site_url(); ?>assets/js/app.js?ver=9"></script>

    <?php //echo "header_notifications:<pre>"; print_r($header_notifications); echo "</pre>";?>
    <?php /*?><script src="/assets/js/require.min.js"></script>
    <script>
      requirejs.config({
          baseUrl: '.'
      		});
    </script><?php */?>
    <!-- Dashboard Core -->
    <link href="<?php echo site_url(); ?>/assets/css/dashboard.css?ver=12" rel="stylesheet" />
    <?php /*?><script src="/assets/js/dashboard.js"></script><?php */?>
    <!-- c3.js Charts Plugin -->
    <?php /*?><link href="/assets/plugins/charts-c3/plugin.css" rel="stylesheet" />
    <script src="/assets/plugins/charts-c3/plugin.js"></script>
    <!-- Google Maps Plugin -->
    <link href="/assets/plugins/maps-google/plugin.css" rel="stylesheet" />
    <script src="/assets/plugins/maps-google/plugin.js"></script>
    <!-- Input Mask Plugin -->
    <script src="/assets/plugins/input-mask/plugin.js"></script><?php */?>
	<?php
	if (isset($css_includes)){
		if (is_array($css_includes)){
			foreach ($css_includes as $css_include){ ?>
				<link rel="stylesheet" href="<?php echo $css_include; ?>">
				<?php
			}
		}
	}
	?>
	<!--<script src="/js/jquery-2.2.2.min.js"></script>
	<link rel="stylesheet" href="/assets/css/style.css?v=<?php //echo time();?>">-->
	<?php 

	if (isset($js_includes)){
		if (is_array($js_includes)){
			foreach ($js_includes as $js_include){ ?>
				<script src="<?php echo $js_include; ?>"></script><?php
			}
		}
	}
	$user_data = $this->session->userdata('user_data');
	//echo "<pre>"; print_r($user_data); echo "</pre>";
	
	$panel_logged_in = $this->uri->segment("1");
	if($panel_logged_in == "admin") $panel_logged_in = "Administrator";
	if($panel_logged_in == "generate") $panel_logged_in = "Data Entry";
	if($panel_logged_in == "back-office") $panel_logged_in = "Back Office";
	if($panel_logged_in == "manager") $panel_logged_in = "Manager";
	if($panel_logged_in == "teamlead-agent") $panel_logged_in = "Teamlead Agent";
	if($panel_logged_in == "teamlead-csr") $panel_logged_in = "Teamlead CSR";
	if($panel_logged_in == "telesale") $panel_logged_in = "Telesale";
	if($panel_logged_in == "csr") $panel_logged_in = "CSR";
	if($panel_logged_in == "dse") $panel_logged_in = "DSE";
	if($panel_logged_in == "teamlead-dse") $panel_logged_in = "Teamlead DSE";
	?>
  </head>
  <body class="">
      <div class="page">
          <div class="page-main">
            <div class="header">
              <div class="container">
                <div class="d-flex">

                  <a class="header-brand" href="/">
                    <img src="<?php echo site_url(); ?>/assets/images/logo.png" class="header-brand-img" alt="Al Wafiq logo">
                  </a>
                  <?php /*?><a class="navbar-brand" href="/">
                    <img src="/assets/images/logo.jpg" class="navbar-brand-img" alt="Wafiq CRM">
                  </a><?php */?>
                  <div class="ml-auto d-flex order-lg-2">
                    <div class="dropdown d-none d-md-flex">
                      <a class="nav-link icon" data-toggle="dropdown">
                        <i class="fe fe-message-square"></i>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow px-4"><?php /*?>notification 1<?php */?></div>
                    </div>
                    <?php if ($this->uri->segment(1) != 'users' && $this->uri->segment(2) != 'notifications') { ?>
                    <div class="dropdown d-none d-md-flex">
                      <a class="nav-link icon" data-toggle="dropdown">
                        <i class="fe fe-bell"></i>
                        <?php 
						if(isset($header_notifications["notifications"]) && count($header_notifications["notifications"]) > 0){?>
                        <span class="nav-unread"></span>
                        <?php }?>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow px-4">
					  <?php
					  if((isset($header_notifications["notifications"]) && count($header_notifications["notifications"]) > 0)){
					  	foreach($header_notifications["notifications"] as $key => $notification){
							echo $notification."<br><br>";
							if($key >= 9){
								echo "<a href='" . site_url() . "users/notifications/'>View All</a>";
								break;
							}
						}
					  }else{
					  	echo "No New Notifcation available currently.<br>";
						echo "<a href='" . site_url() . "users/notifications/'>View All</a>";
					  }?>
                      </div>
                    </div>
                  <?php } ?>
                    <div class="dropdown">
                      <a href="#" class="nav-link pr-0" data-toggle="dropdown">
                        <span class="avatar" style="background-image: url('/uploads/avatars/<?php echo $user_data["avatar"];?>')"></span>
                        <span class="ml-2 d-none d-lg-block">
                          <span class="text-default"><?php echo $user_data["first_name"] . " " .$user_data["last_name"];?></span>
                          <small class="text-muted d-block mt-1"><?php echo $panel_logged_in;?></small>
                        </span>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                        <a class="dropdown-item" href="<?php echo site_url(); ?>users/profile">
                          <span>Profile</span>
                        </a>
                        <?php /*?><a class="dropdown-item" href="#">
                          <span>Settings</span>
                        </a><?php */?>
                        <a class="dropdown-item" href="#">
                          <?php /*?><span class="float-right"><span class="badge badge-primary">6</span></span><?php */?>
                          <span>Inbox</span>
                        </a>
                        <a class="dropdown-item" href="<?php echo site_url() . "users/notifications/"; ?>">
                          <span>Notifications</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="tel:044197811"><i class="fe fe-phone" data-toggle="tooltip" title="" data-original-title="fe fe-phone"></i> Need help?</a>
                        <a class="dropdown-item" href="/users/logout">Logout</a>
                      </div>
                    </div>

                    <a href="#" class="header-toggler ml-3 ml-lg-0 collapsed" data-toggle="collapse" data-target="#headerMenuCollapse" aria-expanded="false">
                      <span class="header-toggler-icon"></span>
                    </a>

                  </div>
                  <div class="collapse navbar-collapse order-lg-1" id="navbarToggler">
                    <ul class="navbar-nav mt-2 mt-lg-0 mx-0 mx-lg-2">
                      <li class="nav-item"><a href="#" class="nav-link">Dashboard</a></li>
                      <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Projects</a>
                        <div class="dropdown-menu mt-2 text-color" role="menu">
                          <a href="#" class="dropdown-item"><i class="dropdown-icon fa fa-tag"></i> Action </a>
                          <a href="#" class="dropdown-item"><i class="dropdown-icon fa fa-pencil"></i> Another action </a>
                          <a href="#" class="dropdown-item"><i class="dropdown-icon fa fa-reply"></i> Something else here</a>
                          <div class="dropdown-divider"></div>
                          <a href="#" class="dropdown-item"><i class="dropdown-icon fa fa-ellipsis-h"></i> Separated link</a>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <?php $this->load->view("templates/top_menu")?>
			<style>
				.dropdown-menu.dropdown-menu-right.dropdown-menu-arrow.px-4, .dropdown-menu.show a.notification-anchor {
					font-size: 12px;
				}
			</style>