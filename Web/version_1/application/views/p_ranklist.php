<?php 

function add_users($users) {
	$str = "";
	$rank = 1;
	foreach ($users as $row) {
		$str .= "<tr>";
		$str .= "<td>$rank</td>";
		$str .= "<td>".$row['username']."</td>";
		$str .= "<td>".$row['motto']."</td>";
		$str .= "<td>".$row['solved']."</td>";
		$str .= "<td>".$row['submit']."</td>";
		$str .= "<td>".(($row['solved'] == 0 || $row['submit'] == 0) ? "0.00" : ($row['solved'] * 100 / $row['submit']))."%</td>";
		$str .= "</tr>";
		
		$rank += 1;
	}
	echo $str;
}

function add_page($cur_page, $max_page) {
	$str = "<div align=\"center\"><font size=4>";
	for($i = 0; $i <= $max_page; $i ++) {
		$str .= "<label><a ";
		if ($i == $cur_page) {
			$str .= "style=\"color:red;\"";
		}
		$str .= "href='" .base_url() ."index.php/ranklist/page/$i' style='margin:4px'>$i</a></label> ";
	}
	$str .= "</font></div>";
	echo $str;
}

?>



<style type="text/css">
th {
  	text-align:center;
  	vertical-align:middle;
}
td {
  	text-align:center;
  	vertical-align:middle;
}
</style>

<div class="am-g">
<div class="am-u-md-9 am-u-lg-centered">
<div align="center">
	<span style="font-size:40;color:#1A5CC8;font-family:Courier New;font-weight:bold;">User Ranklist</span>
</div>
<hr>
<table
	class="am-table am-table-bordered am-table-striped am-table-compact">
	<thead>
		<tr>
			<th width="7%">Rank</th>
			<th width="13%">Username</th>
			<th width="50%">Motto</th>
			<th width="10%">Solved</th>
			<th width="10%">Submissions</th>
			<th width="10%">Ratio</th>
		</tr>
	</thead>
	<tbody>
	<?php add_users($users);?>
	</tbody>
</table>
<?php add_page($cur_page, $max_page);?>
</div>
</div>