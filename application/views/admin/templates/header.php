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
<?php /*?><link rel="stylesheet" href="/assets/css/style.css?v="<?php echo time();?>><?php */?>
<link rel="stylesheet" href="/assets/admin/css/admin.css?v=<?php echo time();?>">
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
        <li><a href="/users/logout/">Logout</a></li>
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
        <li><a href="/csr/">CSR</a></li>
        <li><a href="/telesale/">Telesale</a></li>
        <li class="dropdown">
            <a href="javascript:void(0)">Teamlead</a>
            <div class="dropdown-content">
                <a href="/teamlead/">Teamlead</a>
                <a href="/teamlead/team-members/">Team Members</a>
            </div>
        </li>
        <li><a href="/back-office/">Back Office</a></li>
        <li><a href="/generate/">Number Generate</a></li>
        <li><a href="/admin/">Home</a></li>
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
<br/>
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