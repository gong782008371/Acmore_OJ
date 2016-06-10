<?php session_start(); ?>


<html>
<head lang="en">
  <meta charset="UTF-8">
  <title>Regist Page | Acmore</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta name="format-detection" content="telephone=no">
  <meta name="renderer" content="webkit">
  <link rel="alternate icon" type="image/png" href="assets/i/favicon.png">
  <link rel="stylesheet" href="assets/css/amazeui.min.css"/>
</head>

<body><?php 
require_once ('include/header.php');
?>

<?php 
/*
 * regist.php //访问regist页面
 * regist.php?action=login //确认注册
 * regist.php?action=logout //注销用户
 */


if ($_REQUEST["action"] == NULL) {
	$str = '' .'
	<div class="am-g">
	  <div class="am-u-lg-6 am-u-sm-8 am-u-sm-centered">
	    <h1>Registration</h1>
	    <hr>
		<form method="POST" class="am-form am-form-horizontal" action="regist.php?action=login">
		
		  <div class="am-form-group">
		    <label for="doc-ipt-3" class="am-u-sm-3 am-form-label">User Name</label>
		    <div class="am-u-sm-9">
		      <input type="text" name="username" id="username" placeholder="Username">
		    </div>
		  </div>

		  <div class="am-form-group">
		    <label for="doc-ipt-3" class="am-u-sm-3 am-form-label">Password</label>
		    <div class="am-u-sm-9">
		      <input type="password" name="password" id="password" placeholder="Password">
		    </div>
		  </div>
		  
		  <div class="am-form-group">
		    <label for="doc-ipt-3" class="am-u-sm-3 am-form-label">Comfirm Pwd</label>
		    <div class="am-u-sm-9">
		      <input type="password" name="comfirmpwd" id="comfirmpwd" placeholder="Comfirm Password">
		    </div>
		  </div>

		  <div class="am-form-group">
		    <label for="doc-ipt-3" class="am-u-sm-3 am-form-label">Email</label>
		    <div class="am-u-sm-9">
		      <input type="email" name="email" id="email" placeholder="Email">
		    </div>
		  </div>
		  
		  <div class="am-form-group">
		    <label for="doc-ipt-3" class="am-u-sm-3 am-form-label">School</label>
		    <div class="am-u-sm-9">
		      <input type="text" name="school" id="school" placeholder="School">
		    </div>
		  </div>
		  
		  <div class="am-form-group">
		    <label for="doc-ipt-3" class="am-u-sm-3 am-form-label">Motto</label>
		    <div class="am-u-sm-9">
		      <input type="text" name="motto" id="motto" placeholder="Motto">
		    </div>
		  </div>
		  
		  <div class="am-form-group">
		    <label for="doc-ipt-3" class="am-u-sm-3 am-form-label"></label>
		    <div class="am-u-sm-9">
		      <button type="submit" class="am-btn am-btn-success">Comfirm Registration</button> 
		    </div>
		  </div>
		</form>
	    <hr>
	  </div>
	</div>';
	
	echo $str;
}
elseif ($_REQUEST["action"] == "login") {
	$_SESSION["current_user"] = Array();
	$_SESSION["current_user"]["username"] = $_POST["username"];
	$_SESSION["current_user"]["password"] = $_POST["password"];
	echo "<meta http-equiv=refresh content=\"0; url=" .$last_url ."\">";
}
elseif ($_REQUEST["action"] == "logout") {
	$_SESSION["current_user"] = NULL;
	if ($cur_user["username"] == "admin") {
		$last_url = $_SESSION["lasturl"] = $_SESSION["currenturl"] = "/Acmore/";
	}
	echo "<meta http-equiv=refresh content=\"0; url=". $last_url ."\">";
}
else {
	echo "<h2>Regist.php error request.</h2>";
}
?>

<?php 
require_once ('include/footer.php');
?>
</body>
</html>