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
<a href="/" class="anchor">Home</a> - <a href="/back-office/" class="anchor">Back Office</a> - <a href="/tsa/" class="anchor">TSA</a>
<br/><br/>