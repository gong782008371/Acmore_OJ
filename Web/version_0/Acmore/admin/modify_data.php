<?php 
require_once 'pre_operate.php';
?>

<html>
<head lang="en">
	<meta charset="UTF-8">
	<title>Modify File | Acmore</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta name="format-detection" content="telephone=no">
	<meta name="renderer" content="webkit">
	<link rel="alternate icon" type="image/png" href="../assets/i/favicon.png">
	<link rel="stylesheet" href="../assets/css/amazeui.min.css" />
  <style>
    .header {
      text-align: center;
    }
  </style>
</head>
<body>
<div class="header">
	<p style="font-size:170%;color:#1A5CC8;margin-top: 30px;"><b>Modify File</b></p>
	<p style="font-size:120%;color:blue;"><b>
		<?php
			if($_REQUEST["problem_id"]) echo "Problem " .$_REQUEST["problem_id"] . " : "; 
			if($_REQUEST["title"])		echo $_REQUEST["title"];
		?>
	</b></p>
	<p style="font-size:14px;"><font color="red">
		Keep the corresponding field blank if you don't want to modify the data.<br>
		Be sure that the size of the data file should not be larger than 32MB.
	</font></p>
	<hr />
</div>
<div class="am-g">
<div class="am-u-lg-5 am-u-md-8 am-u-sm-centered">
	<form method="post" class="am-form" action="php_mysql.php?action=modify_data">
		<div class="am-form-group">
		<label for="doc-ipt-file-1">Input File:</label>
	      <input type="file" id="file_in" name="file_in">
	      <p class="am-form-help">请选择要上传的输入文件(.in)...</p>
	    </div>
		<div class="am-form-group">
		<label for="doc-ipt-file-1">Output File:</label>
	      <input type="file" id="file_out" name="file_out">
	      <p class="am-form-help">请选择要上传的输出文件(.out)...</p>
	    </div><br>
		<div class="am-cf">
			<input type="submit" name="" value="Confirm Modify" class="am-btn am-btn-primary am-btn-sm am-fr"> 
		</div>
	</form><hr>
</div>
</div>
<?php require_once '../include/footer.php';?>
</body>
</html>
