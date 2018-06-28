<?php
	function pre($mix){
		echo "<hr><br><pre>"; print_r($mix); echo "</pre><br><hr>"; 
	}
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	$code = '';
	if (isset($_POST['execute_code'])) {
		$code = $_POST['execute_code'];
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Execute PHP Fiddle</title>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<link href='https://fonts.googleapis.com/css?family=Titillium+Web' rel='stylesheet' type='text/css'>
	<style type="text/css">
		body {
			margin: 0;
			font-family: 'Titillium Web', sans-serif;
		}
		h1 {
			text-align: center;
			border-bottom: 1px solid #f2f2f2;
			margin-bottom: 15px;
		}
		h1 span {
			font-size: 20px;
		    float: left;
		    line-height: 58px;
		}
		.container {
		    padding: 20px;
		}
		.row {
			margin-top: 15px;
		}
		.row > div {
			float: left;
		}

		.row > div:first-child {
			margin-right: 20px;
		}
		.code {
			width: 39%;
		}
		.exec-code {
			width: 58%;
		    background: #f2f2f2;
		    border: 1px solid gray;
		    min-height: 293px;
		    padding: 5px;
		    overflow-y: auto;
		}
		textarea {
			width: 100%;
			height: 300px;
		}
		.clear {
			clear: both;
		}
	</style>
</head>
<body>
	<div class="container">
		<h1><span>PHP Version: <?php echo phpversion(); ?></span>Execute PHP Fiddle</h1>
		<div class="clear"></div>
		<div class="row">
			<div class="code">
				<form action="" method="post">
					<textarea name="execute_code" placeholder="Fiddle to Execute" autocomplete="on"><?php echo $code; ?></textarea>
					<br><br>
					<input type="submit" name="execute_code_submit" value="Execute Fiddle">
				</form>
			</div>
			<div class="exec-code">
				<?php eval($code); ?>
			</div>
		</div>
		</div>
</body>
</html>