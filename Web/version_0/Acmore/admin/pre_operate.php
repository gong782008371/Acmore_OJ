<?php 
session_start(); 

$cur_user = $_SESSION["current_user"];

if($cur_user["username"] != "admin") {
	exit();
}
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
if( $last_url == NULL) {
	$last_url = "/Acmore/";
}

?>