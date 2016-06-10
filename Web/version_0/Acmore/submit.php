<?php 
session_start();
require_once 'include/config.php';
if($_REQUEST["action"] == "submit") {
	require_once ("include/db_info.php");
	if (submit_code($_POST)) {
		$_SESSION["error_info"] = "";
		header("Location: /Acmore/status.php");
		exit(0);	
	}
	else {
		$_SESSION["error_info"] = "Submit Code Failed.";
	}
} 
?>

<html>
<head lang="en">
<meta charset="UTF-8">
<title>Index Page | Acmore</title>
<meta name="viewport"
	content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="format-detection" content="telephone=no">
<meta name="renderer" content="webkit">
<link rel="alternate icon" type="image/png" href="assets/i/favicon.png">
<link rel="stylesheet" href="assets/css/editor.css" />
<link rel="stylesheet" href="assets/css/amazeui.min.css" />
<script type="text/javascript" src="assets/js/jquery-1.10.2.min.js"></script>
<script type="text/javascript">
function on_check_input() {
	if (document.getElementById("code").value.length < 20) {
		alert("code is too short.");
		return false;
	} 
	return true;
}
</script>
</head>

<body>
<?php require_once ('include/header.php'); 
if ($_SESSION["current_user"] == NULL) {
	echo "<meta http-equiv=refresh content=\"0; url=login.php\">";
}
?>


<div class="am-g">
<div class="am-u-lg-7 am-u-sm-7 am-u-sm-centered">
<h2 align="center">Submit Your Code</h2>
<hr>
<?php echo "<h4 align=\"center\">".$_SESSION["error_info"]."</h4>";?>
<form id="h-form-code-editor" onsubmit="return on_check_input()" class="form-horizontal" action="submit.php?action=submit" method="post" >
	<header class="tl-code-editor-toolbar clearfix">
		<label>Problem ID</label>
		<input name="problem_id" id="problem_id" value='<?php echo $_REQUEST["pid"]; ?>'/>
		<select name="language" id="language" class="tl-code-editor-lang h-select-lang">
			<option value=<?php echo $language_id["G++"]?> >G++</option>
			<!-- <option value="2" >Java</option> -->
		</select>
	</header>
	<textarea rows="15" style="width:100%" name="code" id="code"></textarea><br>
	<footer class="tl-code-editor-footer clearfix">
		<div align="center">
			<button type="submit" class="am-btn am-btn-primary am-radius">Submit</button>
		</div>
	</footer>
</form>
<hr>
</div>
</div>

<?php require_once ('include/footer.php'); ?>
<script type="text/javascript" src="assets/js/ace.js"></script>
<script type="text/javascript" src="assets/js/code-editor.js"></script>
</body>
</html>
