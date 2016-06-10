<?php session_start(); 
require_once ("include/db_info.php");

// 添加分页
function add_page() {
	$max_page = problem_page_query();
	$str = "<div align=\"center\"><font size=4>";
	for($i = 0; $i <= $max_page; $i ++) {
		$str .= "<label><a ";
		if ($i == $_REQUEST["vol"]) {
			$str .= "style=\"color:red;\"";
		}
		$str .= "href=\"problem.php?vol=$i\" style=\"margin:4px\">$i</a></label> ";
	}
	$str .= "</font></div>";
	echo $str;
}

// 添加题目
function add_problem($current_page) {
	$lower_bound_id = 1000 + $current_page * $GLOBALS["page_cnt_problem"];
	$upper_bound_id = $lower_bound_id + $GLOBALS["page_cnt_problem"];
	$problems = problem_query($lower_bound_id, $upper_bound_id);
	$str = "";
	foreach ($problems as $key=>$value) {
		$str .= "<tr>";
		if( $_SESSION["current_user"] != NULL) {
			$str .= "<td align=\"center\">";
			if($key % 2 == 0) {
				$str .= "<label style=\"color:green;\">Y</label>";
			}
			elseif ($key % 2 == 1) {
				$str .= "<label style=\"color:red;\"  >N</label>";
			}
			$str .= "</td>";
		}
		$radio = 0.00;
		if($value["total"] > 0) {
			$radio = $value["accept"] * 100.0 / $value["total"];
		}
		$str .= "<td align=\"center\">$key</td><td><a href=\"showproblem.php?pid=$key\">" 
				.$value["title"] ."</a></td><td align=\"center\">"
				.$radio ."%(" .$value["accept"] ."/" .$value["total"] .")</td></tr>";
	}
	echo $str;
}
?>

<html>
<head lang="en">
<meta charset="UTF-8">
<title>Problem Page | Acmore</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="format-detection" content="telephone=no">
<meta name="renderer" content="webkit">
<link rel="alternate icon" type="image/png" href="assets/i/favicon.png">
<link rel="stylesheet" href="assets/css/amazeui.min.css" />
</head>

<body>
<?php require_once ('include/header.php'); ?>
<div class="am-g">
<div class="am-u-md-9 am-u-lg-centered">
<div align="center">
	<span style="font-size:40;color:#1A5CC8;font-family:Courier New;font-weight:bold;">Problem List</span>
</div>
<hr>
<?php add_page()?>
<table
	class="am-table am-table-bordered am-table-striped am-table-compact">
	<thead>
		<tr>
			<?php if($_SESSION["current_user"] != NULL) { echo "<th width=\"3%\">Status</th>"; } ?>
			<th width="5%">Pro.ID</th>
			<th width="80%">Title</th>
			<th width="12%">Ratio(Accepted/Submissions)</th>
		</tr>
	</thead>
	<tbody>
	<?php add_problem($_REQUEST["vol"]); ?>
	</tbody>
</table>
<?php add_page()?>
</div>
</div>

<?php require_once ('include/footer.php'); ?>
</body>
</html>
