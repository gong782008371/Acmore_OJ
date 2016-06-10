<?php session_start(); ?>

<html>
<head lang="en">
  <meta charset="UTF-8">
  <title>Index Page | Acmore</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta name="format-detection" content="telephone=no">
  <meta name="renderer" content="webkit">
  <link rel="alternate icon" type="image/png" href="../assets/i/favicon.png">
  <link rel="stylesheet" href="../assets/css/amazeui.min.css"/>
</head>
<frameset rows="9,100" frameborder="0" >
<frame name="menu" src="header.php" scrolling="no" noresize >
<frame name="content" src=
<?php
if(!strstr($_SESSION["currenturl"], "admin")) {
	$_SESSION["currenturl"] = "/Acmore/admin/welcome.php";
} 
echo $_SESSION["currenturl"];
?> 
>
</frameset>
</html>