<?php 
function add_page($max_page, $cur_page) {
	$str = "<div align=\"center\"><font size=4>";
	for($i = 0; $i <= $max_page; $i ++) {
		$str .= "<label><a ";
		if ($i == $cur_page) {
			$str .= "style=\"color:red;\"";
		}
		$str .= "href='" .base_url() ."index.php/problem/page/$i' style='margin:4px'>$i</a></label> ";
	}
	$str .= "</font></div>";
	echo $str;
}

// 添加题目
function add_problem($problems, $status=NULL) {
	$str = "";
	foreach ($problems as $key=>$value) {
		if($value['visiable'] != 'Y') {
			continue;
		}
		if($status) {
			if($status[$key] == 1) {
				$str .= "<tr class=\"am-primary\"><td align=\"center\"><label style=\"color:green;\">Y</label>";
			}
			elseif ($status[$key] == -1) {
				$str .= "<tr class=\"am-danger\"><td align=\"center\"><label style=\"color:red;\"  >N</label>";
			}
			else {
				$str .= "<tr><td align=\"center\">";
			}
			$str .= "</td>";
		}
		else {
			$str .= "<tr>";
		}
		$radio = 0.00;
		if($value["accept"] > 0) {
			$radio = $value["accept"] * 100.0 / $value["total"];
		}
		$str .= "<td align=\"center\">$key</td><td><a href=\"" .base_url() ."index.php/problem/show_problem/$key\">" 
				.$value["title"] ."</a></td><td align=\"center\">"
				.$radio ."%(" .$value["accept"] ."/" .$value["total"] .")</td></tr>";
	}
	echo $str;
}
?>


<div class="am-g">
<div class="am-u-md-9 am-u-lg-centered">
<div align="center">
	<span style="font-size:40;color:#1A5CC8;font-family:Courier New;font-weight:bold;">Problem List</span>
</div>
<hr>
<?php add_page($max_page, $cur_page)?>
<table
	class="am-table am-table-bordered am-table-striped am-table-compact">
	<thead>
		<tr>
			<?php if(key_exists('username', $_SESSION) && $_SESSION['username'] != NULL) { echo "<th width=\"3%\">Status</th>"; } ?>
			<th width="5%">Pro.ID</th>
			<th width="80%">Title</th>
			<th width="12%">Ratio(Accepted/Submissions)</th>
		</tr>
	</thead>
	<tbody>
<?php 
if(key_exists('username', $_SESSION) && $_SESSION['username'] != NULL){
	add_problem($problems, $status); 
}
else {
	add_problem($problems);
}
?>
	</tbody>
</table>
<?php add_page($max_page, $cur_page)?>
</div>
</div>