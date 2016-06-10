<?php 
$current_url = str_replace('/Acmore_1/', '', $_SERVER["REQUEST_URI"]);
if(!key_exists('currenturl', $_SESSION)) {
	$_SESSION['currenturl'] = $current_url;
}
if (!key_exists('lasturl', $_SESSION)) {
	$_SESSION['lasturl'] = 'index.php/home';
}
function is_login_regist($url) {
	return strstr($url, "login") || strstr($url, "regist");
}
if( !(is_login_regist($_SESSION["currenturl"]) && is_login_regist($current_url)) ) {
	if( $_SESSION["currenturl"] != $current_url ) {
		$_SESSION["lasturl"] = $_SESSION["currenturl"];
		$_SESSION["currenturl"] = $current_url; 
	}
}
?>
<html>
<head lang="en">
  <meta charset="UTF-8">
  <title><?php echo  $title; ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta name="format-detection" content="telephone=no">
  <meta name="renderer" content="webkit">
  <link rel="alternate icon" type="image/png" href="<?php echo base_url(); ?>assets/i/favicon.png">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/amazeui.min.css"/>
</head>

<body>
<header class="am-topbar am-topbar-inverse">
  	<h1 class="am-topbar-brand">
    	<a href="<?php echo base_url(); ?>"> <span class="am-icon-home am-icon-sm"></span>Acmore</a>
  	</h1>
  	<button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only" data-am-collapse="{target: '#doc-topbar-collapse'}">
  		<span class="am-sr-only">导航切换</span> 
    	<span class="am-icon-bars"></span>
  	</button>
	<div class="am-collapse am-topbar-collapse" id="doc-topbar-collapse">
	    <ul class="am-nav am-nav-pills am-topbar-nav">
	      <li ><a href="<?php echo base_url(); ?>">Home</a></li>
	      <li ><a href="<?php echo base_url(); ?>index.php/problem">Problem</a></li>
	      <li ><a href="<?php echo base_url(); ?>index.php/ranklist">Ranklist</a></li>
	      <li ><a href="<?php echo base_url(); ?>index.php/status">Status</a></li>
	      <!-- <li ><a href="<?php echo base_url(); ?>index.php/welcome">Contest</a></li> -->
	    </ul>
		<div class="am-topbar-right">
		  <?php
		  if (key_exists('username', $_SESSION) && $_SESSION['username'] != NULL) {
			  echo "<div class=\"am-topbar-right\"><a href=\"" .base_url() ."index.php/login/sign_out\"><button class=\"am-btn am-btn-primary am-topbar-btn am-btn-sm\"><span class=\"am-icon-pencil\"></span> Logout</button></a></div>";
			  if ($_SESSION['username'] == 'admin') {
			  	  echo "<div class=\"am-topbar-right\"><a href=\"" .base_url() ."index.php/admin/\"><button class=\"am-btn am-btn-primary am-topbar-btn am-btn-sm\"><span class=\"am-icon-user\"></span>admin</button></a></div>";
			  }
			  else {
			      echo "<div class=\"am-topbar-right\"><button class=\"am-btn am-btn-primary am-topbar-btn am-btn-sm\"><span class=\"am-icon-user\"></span> ". $_SESSION['username'] ."</button></div>";
			  }
		  } 
		  else {
		  	  echo "<div class=\"am-topbar-right\"><a href=\"" .base_url() ."index.php/regist/sign_up\"><button class=\"am-btn am-btn-primary am-topbar-btn am-btn-sm\"><span class=\"am-icon-pencil\"></span> Register</button></a></div>";
		  	  echo "<div class=\"am-topbar-right\"><a href=\"" .base_url() ."index.php/login/sign_in\"><button class=\"am-btn am-btn-primary am-topbar-btn am-btn-sm\"><span class=\"am-icon-user\"></span> Login</button></a></div>";
		  }
		  ?>
	    </div>
	</div>
</header>
