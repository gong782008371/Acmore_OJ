<?php 
function add_problem($problems) {
	$str = "";
	foreach ($problems as $key=>$value) {
		$str .= "<tr>";
		$str .= "<td align=\"center\">$key</td>"
				."<td><a href=\"" .base_url() ."index.php/problem/show_problem/$key\"><font color=blue>".$value["title"] ."<font></a></td>"
				."<td align=\"center\"><a href=" .base_url() ."index.php/admin/problem_list/change_visiable/$key/".$value['visiable'].">" .($value['visiable']=='Y' ? '<font color="green">Available</font>' : '<font color="red">Reserved</font>') ."</a></td>"
				."<td align=\"center\"><a href=" .base_url() ."index.php/admin/problem_list/delete_problem/$key>" ."<font color=red>Delete</font></a></td>"
				."<td align=\"center\"><a href=" .base_url() ."index.php/admin/problem/edit_problem/$key>" ."<font color=blue>Edit</font></a></td>"
				."<td align=\"center\"><a href=" .base_url() ."index.php/admin/problem/modify_data/$key>" ."<font color=blue>ModifyData</font></a></td>";
		$str .= "</tr>";
	}
	echo $str;
}

function add_page($head, $page_cnt) {
	if(!key_exists('max_pid', $_SESSION) || $_SESSION['max_pid'] == NULL) {
		return "";
	}
	$total_page = $_SESSION['max_pid'];
	$str = "";
	$index = 1;
	for ($i = $_SESSION['max_pid']; $i >= 1000; $i -= $page_cnt) {
		$str .= "<li" .($i==$head ? " class=am-active" : "") ."><a href=" .base_url() ."index.php/admin/problem_list/page/$i>$index</a></li>";
		$index += 1;
	}
	echo $str;
}
?>

<style type="text/css">
th {
  	text-align:center;
  	vertical-align:middle;
}
</style>

<div class="am-cf am-padding">
  <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">题目管理</strong> / <small>所有题目列表</small></div>
</div>
<hr>

<div class="am-g">
  <div class="am-u-sm-12">
    <table class="am-table am-table-bd am-table-striped admin-content-table">
      <thead>
        <tr>
          <th width="10%">Problem ID</th>
          <th width="42%">Title</th>
          <th width="12%">Status</th>
          <th width="12%">Delete</th>
          <th width="12%">Edit</th>
          <th width="12%">Modify Data</th>
        </tr>
      </thead>
      <tbody>
        <?php add_problem($problems);?>
      </tbody>
    </table>
  </div>
</div>
<ul class="am-pagination am-fl admin-content-pagination">
  <li <?php if ($head >= $_SESSION['max_pid']) echo " class=am-disabled";?>><a href="<?php echo base_url()?>index.php/admin/problem_list/page/<?php echo ($head+$page_cnt);?>">&laquo;</a></li>
  <?php add_page($head, $page_cnt);?>
  <li <?php if ($head < 1000+$page_cnt) echo " class=am-disabled";?>><a href="<?php echo base_url()?>index.php/admin/problem_list/page/<?php echo ($head-$page_cnt);?>">&raquo;</a></li>
</ul>
<br><br><br>