<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="keywords" content="<?php //echo $seo_data["keywords"];?>" />
<meta name="description" content="<?php //echo $seo_data["keywords"];?>" />
<title>CRM<?php //echo $seo_data["title"];// echo ($seo_data["title_arabic"] != "")?" | ".$seo_data["title_arabic"]:"";?></title>

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<![endif]-->
<!--[if lt IE 9]>
  <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/r29/html5.min.js"></script>
  <![endif]-->
  <?php
 // echo "Home header<br>";
  //var_dump($css_includes); echo "<br><br>";
  //echo "<pre>"; print_r($css_includes); echo "</pre>";
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