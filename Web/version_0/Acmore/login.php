<?php session_start(); ?>


<html>
<head lang="en">
  <meta charset="UTF-8">
  <title>Login Page | Acmore</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta name="format-detection" content="telephone=no">
  <meta name="renderer" content="webkit">
  <link rel="alternate icon" type="image/png" href="assets/i/favicon.png">
  <link rel="stylesheet" href="assets/css/amazeui.min.css"/>
  <style>
    .header {
      text-align: center;
    }
    .header h1 {
      font-size: 200%;
      color: #333;
      margin-top: 30px;
    }
    .header p {
      font-size: 14px;
    }
  </style>
</head>

<body><?php 
require_once ('include/header.php');
require_once ("include/db_info.php");
?>

<?php

/*
 * login.php //访问login.php页面
 * login.php?action=login //登录请求
 */

if ($_REQUEST["action"] == NULL) {
	$str = '' . '
	<div class="header">
	  <div class="am-g">
	    <h1>Login Page</h1>
	  </div>
	  <p><font color="red"></font></p>
	  <hr />
	</div>
	<div class="am-g">
	  <div class="am-u-lg-5 am-u-md-8 am-u-sm-centered">
	    <form method="post" class="am-form" action="login.php?action=login">
	      <label for="text">User Name:</label>
	      <input type="text" name="username" id="username">
	      <br>
	      <label for="password">Password:</label>
	      <input type="password" name="password" id="password">
	      <br><br/>
	      <div class="am-cf">
	        <input type="submit" name="" value="Confirm Login" class="am-btn am-btn-primary am-btn-sm am-fl">
	        <input type="submit" name="" value="Forget Password ^_^? " class="am-btn am-btn-default am-btn-sm am-fr">
	      </div>
	    </form>
	    <hr>
	  </div>
	</div>';
	
	echo $str;
}
elseif ($_REQUEST["action"] == "login") {
	if(check_user($_POST["username"], $_POST["password"])) {
		$_SESSION["current_user"] = Array();
		$_SESSION["current_user"]["username"] = $_POST["username"];
		$_SESSION["current_user"]["password"] = $_POST["password"];
		
		echo "<meta http-equiv=refresh content=\"0; url=" .$last_url ."\">";
	}
	else {
		echo "<meta http-equiv=refresh content=\"0; url=login.php\">";
	}
}
else {
	echo "<h2>Login error request.</h2>";
}
?>



<?php 
require_once ('include/footer.php');
?>
</body>
</html>