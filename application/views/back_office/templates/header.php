<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<meta name="keywords" content="<?php //echo $seo_data["keywords"];?>" />
<meta name="description" content="<?php //echo $seo_data["keywords"];?>" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>CRM<?php //echo $seo_data["title"]; //echo ($seo_data["title_arabic"] != "")?" | ".$seo_data["title_arabic"]:"";?></title>

<!--[if lt IE 9]>
<script src="/assets/js/html5shiv.js"></script>
<![endif]-->
<!--[if lt IE 9]>
  <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/r29/html5.min.js"></script>
  <![endif]-->
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
<script src="/js/jquery-2.2.2.min.js"></script>
<link rel="stylesheet" href="/assets/css/style.css?v=<?php echo time();?>">
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
<body>
<ul class="top-menu">
	<li style="float:left;padding:10px;">Back Office Panel</li>
  	<li><a href="/users/logout/">Logout</a></li>
    <li><a href="/back-office/">Home</a></li>
  <?php /*?><li class="dropdown">
  	<a href="javascript:void(0)">Back Office</a>
    <div class="dropdown-content">
      <a href="/back-office/export/">Export</a>
      <a href="/back-office/import/">Import</a>
    </div>
  </li>
  <li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn">TSA</a>
  </li><?php */?>
</ul>
<?php /*?><ul>
  <li><a href="/">Home</a></li>
  <li class="dropdown">
  	<a href="javascript:void(0)">Back Office</a>
    <div class="dropdown-content">
      <a href="/back-office/export/">Export</a>
      <a href="/back-office/import/">Import</a>
    </div>
  </li>
  <li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn">TSA</a>
  </li>
</ul>
<br/><br/><?php */?>