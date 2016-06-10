<?php 
function add_result_button($sid, $result, $result_name) {
	$str = "";
	switch ($result) {
	case 0: // pending
		$str = "<button type='button' class='am-btn am-btn-warning'>$result_name</button>";
		break;
	case 1: // Accept
		$str = "<button type='button' class='am-btn am-btn-success'>$result_name</button>";
		break;
	case 2: // Presentation Error
		$str = "<button type='button' class='am-btn am-btn-primary'>$result_name</button>";
		break;
	case 3: // Compile Error
		$str = "<button type='button' class='am-btn am-btn-default'><a href=" .base_url() ."index.php/status/compile_info/$sid>$result_name</a></button>";
		break;
	case 4: // Wrong Answer
		$str = "<button type='button' class='am-btn am-btn-danger'>$result_name</button>";
		break;
	case 5: // Runtime Error
		$str = "<button type='button' class='am-btn am-btn-primary'>$result_name</button>";
		break;
	case 6: // Time Limit Exceeded
		$str = "<button type='button' class='am-btn am-btn-primary'>$result_name</button>";
		break;
	case 7: // Memory Limit Exceeded
		$str = "<button type='button' class='am-btn am-btn-primary'>$result_name</button>";
		break;
	case 8: // Output Limit Exceeded
		$str = "<button type='button' class='am-btn am-btn-primary'>$result_name</button>";
		break;
	case 9: // running
		$str = "<button type='button' class='am-btn am-btn-secondary'>$result_name <i class='am-icon-gear am-icon-spin'></i></button>";
		break;
	}
	return $str;
}

function add_code_length($s_id, $solution_owner, $code_length) {
	if (!key_exists('username', $_SESSION) 
			|| $_SESSION['username'] == NULL 
			|| $_SESSION['username'] != $solution_owner) {
		return "$code_length<small>B</small>";
	}
	return "<a href=" .base_url() ."index.php/status/show_code/$s_id>$code_length<small>B</small></a>";
}
// current page[last, first]
function add_solution($solutions, $result_name, $language_name) {
	$str = "";
	foreach ($solutions as $s) {
		$s_id 		= $s["solution_id"];
		$username 	= $s["username"];
		$p_id 		= $s["problem_id"];
		$result		= $result_name[$s["result"]];
		$memory		= $s["memory"];
		$time		= $s["time"];
		$lang		= $language_name[$s["language"]];
		$code_length= $s["code_length"];
		$submit_time= $s["submit_time"];
		$str .= "<tr><td>$s_id</td><td>$username</td><td><a href=" .base_url() ."index.php/problem/show_problem/$p_id" .">$p_id</a></td>";
		$str .= "<td>" .add_result_button($s_id, $s["result"], $result_name[$s["result"]]) . "</td>";
		$str .= "<td>$memory<small>KB</small></td><td>$time<small>MS</small></td><td>$lang</td>";
		$str .= "<td>" .add_code_length($s_id, $username, $code_length) ."</td><td>$submit_time</td></tr>";
	}
	echo $str;
}
function pre_page($head) {
	return base_url() ."index.php/status/page/".($head+10);
}
function next_page($head) {
	return base_url() ."index.php/status/page/".($head-10);
}
?>

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


<div class="am-g">
<div class="am-u-md-9 am-u-lg-centered">
<div align="center">
	<span style="font-size:40;color:#1A5CC8;font-family:Courier New;font-weight:bold;">Judge Status</span>
</div>
<hr>
<?php //echo var_dump($solutions)?>
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
	<?php add_solution($solutions, $result_name, $language_name);?>
	</tbody>
</table>
<p>	[<a href="<?php echo base_url()?>index.php/status">Top</a>] 
<?php
	if ($head+10 <= $_SESSION['max_sid'])  {echo "[<a href=\""  .pre_page($head) ."\">Previous Page</a>]";}
	if ($head >= 10) {echo "[<a href=\"" .next_page($head) ."\">Next Page</a>]";}
?> 
</p>
<hr>
</div>
</div>