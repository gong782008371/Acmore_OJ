<header class="am-topbar am-topbar-inverse">
  <h1 class="am-topbar-brand">
    <a href="/Acmore"> <span class="am-icon-home am-icon-sm"></span>Acmore</a>
  </h1>
  <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only"
          data-am-collapse="{target: '#doc-topbar-collapse'}"><span class="am-sr-only">导航切换</span> <span
      class="am-icon-bars"></span></button>

<div class="am-collapse am-topbar-collapse" id="doc-topbar-collapse">
    <ul class="am-nav am-nav-pills am-topbar-nav">
      <li ><a href="/Acmore/">Home</a></li>
      <li ><a href="/Acmore/problem.php?vol=0">Problem</a></li>
      <li ><a href="/Acmore/contest.php">Contest</a></li>
      <li ><a href="/Acmore/ranklist.php">Ranklist</a></li>
      <li ><a href="/Acmore/status.php">Status</a></li>
    </ul>
<?php 
require_once ('config.php');
$cur_user = $_SESSION["current_user"];

/* 
 * 记录上一个页面，登陆或注册完成后返回此页面
*/
function is_login_regist($url) {
	return strstr($url, "login.php") || strstr($url, "regist.php");
}
if( !(is_login_regist($_SESSION["currenturl"]) && is_login_regist($_SERVER["REQUEST_URI"])) ) {
	if( $_SESSION["currenturl"] != $_SERVER['REQUEST_URI'] ) {
		$_SESSION["lasturl"] = $_SESSION["currenturl"];
		$_SESSION["currenturl"] = $_SERVER['REQUEST_URI']; 
	}
}
$last_url = $_SESSION["lasturl"];
if($last_url == NULL) {
	$last_url = "index.php";
}


/*
 * 根据是否有用户已经登录显示不同
*/
$str = "";
if($cur_user == NULL) {
	$str .= "
    <div class=\"am-topbar-right\">
      <a href=\"/Acmore/regist.php\"><button class=\"am-btn am-btn-primary am-topbar-btn am-btn-sm\"><span class=\"am-icon-pencil\"></span> Register</button></a>
    </div>
    <div class=\"am-topbar-right\">
      <a href=\"/Acmore/login.php\"><button class=\"am-btn am-btn-primary am-topbar-btn am-btn-sm\"><span class=\"am-icon-user\"></span> Login</button></a>
    </div>
    ";
}
else {
	$str .= "
	  <div class=\"am-topbar-right\">
        <a href=\"/Acmore/regist.php?action=logout\"><button class=\"am-btn am-btn-primary am-topbar-btn am-btn-sm\"><span class=\"am-icon-pencil\"></span> Logout</button></a>
      </div>
      <div class=\"am-topbar-right\">";
	if($cur_user["username"] == "admin") { $str .= "
	    <a href=\"/Acmore/admin/\"><button class=\"am-btn am-btn-primary am-topbar-btn am-btn-sm\"><span class=\"am-icon-user\"></span> ". $cur_user["username"] ."</button></a>";
	}
	else { $str.="
	    <button class=\"am-btn am-btn-primary am-topbar-btn am-btn-sm\"><span class=\"am-icon-user\"></span> ". $cur_user["username"] ."</button>";
	}
	$str .="
	  </div>";
}
echo $str;

?>
  </div>
</header>