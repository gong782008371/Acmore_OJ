<?php require_once 'pre_operate.php'; ?>

<html>
<head lang="en">
  <meta charset="UTF-8">
  <title>Index Page | Acmore</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta name="format-detection" content="telephone=no">
  <meta name="renderer" content="webkit">
  <link rel="alternate icon" type="image/png" href="../assets/i/favicon.png">
  <link rel="stylesheet" href="../assets/css/amazeui.min.css"/>
  <link rel="stylesheet" href="http://s.amazeui.org/assets/2.x/css/amaze.min.css?v=ingydlbc">
</head>
<body>
<header class="am-topbar am-topbar-inverse">
  <h1 class="am-topbar-brand">
    <a href="/Acmore/admin/welcome.php" target="content"> <span class="am-icon-home am-icon-sm"></span>Administrator</a>
  </h1>
<div class="am-collapse am-topbar-collapse" id="doc-topbar-collapse">
    <ul class="am-nav am-nav-pills am-topbar-nav">
      <li ><a href="/Acmore/" target="_parent">OnlineJudge</a></li>
      <li ><a href="/Acmore/admin/add_problem.php" target="content">AddProblem</a></li>
    </ul>
    
<?php
$str = "";
if($cur_user == NULL) {
	$str .= "
	<div class=\"am-topbar-right\">
      <a href=\"/Acmore/login.php\"><button class=\"am-btn am-btn-primary am-topbar-btn am-btn-sm\"><span class=\"am-icon-user\"></span> Login</button></a>
    </div>";
}
else {
	$str .= "
	<div class=\"am-topbar-right\">
      <a href=\"/Acmore/regist.php?action=logout\" target=\"_parent\"><button class=\"am-btn am-btn-primary am-topbar-btn am-btn-sm\"><span class=\"am-icon-user\"></span> Logout</button></a>
    </div>
    <div class=\"am-topbar-right\">
      <button class=\"am-btn am-btn-primary am-topbar-btn am-btn-sm\"><span class=\"am-icon-user\"></span> ". $cur_user["username"] ."</button>
    </div>";
}
echo $str;
?>

</div>
</header>
</body>
</html>