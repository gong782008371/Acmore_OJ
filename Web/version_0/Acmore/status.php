<?php 
session_start();
require_once ("include/db_info.php");
// current page[last, first]
$first;
$last;
function add_solution() {
	if ($_REQUEST["first"]) {
		$GLOBALS["first"] = $_REQUEST["first"];
		$GLOBALS["last"]  = max(1, $_REQUEST["first"] - $GLOBALS["page_cnt_solution"] + 1);
	}
	elseif ($_REQUEST["last"]) {
		$GLOBALS["first"] = $_REQUEST["last"] + $GLOBALS["page_cnt_solution"] - 1;
		$GLOBALS["last"]  = $_REQUEST["last"];
	}
	else {
		$GLOBALS["first"] = 0;
		$GLOBALS["last"] = 1000000;
	}
	$str = "";
	$solutions = solution_query($GLOBALS["last"], $GLOBALS["first"]);
	foreach ($solutions as $s) {
		$s_id 		= $s["solution_id"];
		$username 	= $s["username"];
		$p_id 		= $s["problem_id"];
		$result		= $GLOBALS["id_result"][$s["result"]];
		$memory		= $s["memory"];
		$time		= $s["time"];
		$lang		= $GLOBALS["id_language"][$s["language"]];
		$code_length= $s["code_length"];
		$submit_time= $s["submit_time"];
		$str .= "<tr><td>$s_id</td><td>$username</td><td><a href=showproblem.php?pid=$p_id>$p_id</a></td>";
		$str .= "<td>$result</td><td>{$memory}KB</td><td>{$time}MS</td><td>$lang</td><td>{$code_length}B</td><td>$submit_time</td></tr>";
		$GLOBALS["first"] = max($GLOBALS["first"], $s_id);
		$GLOBALS["last"]  = min($GLOBALS["last"],  $s_id);
	}
	echo $str;
}
function has_pre() {
	return ($GLOBALS["first"] - $GLOBALS["last"]) == $GLOBALS["page_cnt_solution"] || $_REQUEST["first"];
}
function has_next() {
	return $GLOBALS["last"] <= 1 || ($GLOBALS["first"] - $GLOBALS["page_cnt_solution"]) > 0;
}
function pre_page() {
	return "status.php?last=" . ($GLOBALS["first"] + 1);
}
function next_page() {
	if($GLOBALS["last"] - 1 <= 0) {
		return "status.php";
	}
	return "status.php?first=". ($GLOBALS["last"] - 1);
}

?>


<html>
<head lang="en">
  <meta charset="UTF-8">
  <title>Status Page | Acmore</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta name="format-detection" content="telephone=no">
  <meta name="renderer" content="webkit">
  <link rel="alternate icon" type="image/png" href="assets/i/favicon.png">
  <link rel="stylesheet" href="assets/css/amazeui.min.css"/>
  <style type="text/css">
  td {
  	text-align:center;
  	vertical-align:middle;
  }
  th {
  	text-align:center;
  	vertical-align:middle;
  }
  </style>
</head>

<body><?php 
require_once ('include/header.php');
?>

<div class="am-g">
<div class="am-u-md-9 am-u-lg-centered">
<div align="center">
	<span style="font-size:40;color:#1A5CC8;font-family:Courier New;font-weight:bold;">Judge Status</span>
</div>
<hr>
<table class="am-table am-table-bordered am-table-striped am-table-compact">
	<thead>
		<tr align="center">
			<th width="7%" >Run ID</th>
			<th width="10%">User</th>
			<th width="7%" >Problem</th>
			<th width="13%">Result</th>
			<th width="9%" >Memory</th>
			<th width="9%" >Time</th>
			<th width="7%" >Language</th>
			<th width="14%">Code Length</th>
			<th width="24%">Submit Time</th>
		</tr>
	</thead>
	<tbody>
	<?php add_solution();?>
	</tbody>
</table>
<p>	[<a href="status.php">Top</a>] 
<?php
	if (has_pre())  {echo "[<a href=\""  .pre_page() ."\">Previous Page</a>]";}
	if (has_next()) {echo "[<a href=\"" .next_page() ."\">Next Page</a>]";}
?> 
</p>
<hr>
</div>
</div>

<?php 
require_once ('include/footer.php');
?>
</body>
</html>