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
    <title>Login - CRM</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
    <script src="<?php echo base_url(); ?>/js/jquery-2.2.2.min.js"></script>
    <?php /*?><script src="/assets/js/require.min.js"></script>
    <script>
      requirejs.config({
          baseUrl: '.'
      		});
    </script><?php */?>
    <!-- Dashboard Core -->
    <link href="<?php echo base_url(); ?>/assets/css/dashboard.css" rel="stylesheet" />
    <?php /*?><script src="/assets/js/dashboard.js"></script><?php */?>
    <?php /*?><!-- c3.js Charts Plugin -->
    <link href="/assets/plugins/charts-c3/plugin.css" rel="stylesheet" />
    <script src="/assets/plugins/charts-c3/plugin.js"></script><?php */?>
     <?php /*?><!-- Google Maps Plugin -->
    <link href="/assets/plugins/maps-google/plugin.css" rel="stylesheet" />
   <script src="/assets/plugins/maps-google/plugin.js"></script><?php */?>
    <!-- Input Mask Plugin -->
    <?php /*?><script src="/assets/plugins/input-mask/plugin.js"></script><?php */?>
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
	?>
  </head>
  <body class="">