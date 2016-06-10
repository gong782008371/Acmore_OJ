<?php session_start(); ?>


<html>
<head lang="en">
  <meta charset="UTF-8">
  <title>Problem - <?php echo $_REQUEST["pid"];?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta name="format-detection" content="telephone=no">
  <meta name="renderer" content="webkit">
  <link rel="alternate icon" type="image/png" href="assets/i/favicon.png">
  <link rel="stylesheet" href="assets/css/amazeui.min.css"/>
  <style type="text/css">
	div.panel_title {
		height: 38px;
		padding: 0 14px;
		color: #7CA9ED;
		font-size: 18px;
		font-family: Arial;
		font-weight: bold
	}
	div.panel_content {
		height: auto;
		background: url(panel-content.png) repeat-y;
		margin: 0;
		padding: 0 20px;
		font-size: 14px;
		font-family: Courier New;
		text-align: left
	}
	div.panel_bottom {
		height: auto;
		margin: 0;
		background: url(panel-bottom.png) left top no-repeat
	}
	div.panel_content pre {
		word-wrap: break-word;
		white-space: pre-wrap;
		margin: 0;
		font-size: 14px
	}
  </style>
</head>

<body><?php 
require_once ('include/header.php');
?>

<?php
	$p_pid			= 1000;
	$p_title 		= "A + B";
	$p_time_java 	= 2000;
	$p_time_other 	= 1000;
	$p_mem_java 	= 65536;
	$p_mem_other	= 32768;
	$p_total_sub	= 566399;
	$p_ac_sub		= 179834;
	$p_desciption	= "Calculate <i>A + B</i>.";
	$p_input		= "Each line will contain two integers <i>A</i> and <i>B</i>. Process to end of file.";
	$p_output		= "For each case, output <i>A + B</i> in one line.";
	$p_sam_input	= "1 1";
	$p_sam_output	= "2";
	$p_author		= "HDOJ";
	
	
	require_once ("include/db_info.php");
	$sql = "
		select problem_id, title, java_time, other_time, java_mem, other_mem, description, input, output, sample_input, sample_output, hint, author, total_submit, accept_submit 
		from problems 
		where problem_id = " .$_REQUEST["pid"];
	$result = $conn->query($sql);
	if(!$result) {
		die("query wrong with sql:" .$sql);
	}
	$row = $result->fetch_assoc();
	if (!$row) {
		echo "<h1 align='center'>do not find problem with pid = " .$_REQUEST["pid"] ."</h1>";
	} 
	else {
		$p_pid			= $row["problem_id"];
		$p_title 		= $row["title"];
		$p_time_java 	= $row["java_time"] * 1000;
		$p_time_other 	= $row["other_time"] * 1000;
		$p_mem_java 	= $row["java_mem"] * 1024;
		$p_mem_other	= $row["other_mem"] * 1024;
		$p_total_sub	= $row["total_submit"];
		$p_ac_sub		= $row["accept_submit"];
		$p_desciption	= $row["description"];
		$p_input		= $row["input"];
		$p_output		= $row["output"];
		$p_sam_input	= $row["sample_input"];
		$p_sam_output	= $row["sample_output"];
		$p_author		= $row["author"];
		
	}
?>

<div class="am-g">
	<div class="am-u-md-9 am-u-lg-centered" >
		<div align="center">
			<span style="font-size:40;color:#1A5CC8;font-family:Courier New;font-weight:bold;"><?php echo $p_title?></span>
		</div>
		<div align="center" style="font-family:Arial">
			<span style="font-size:10;color:green;font-weight:bold;"><?php echo "Time Limit: $p_time_java/$p_time_other MS (Java/Others)&nbsp;&nbsp;Memory Limit: $p_mem_java/$p_mem_other K (Java/Others)<br>Total Submission(s): $p_total_sub&nbsp;&nbsp;Accepted Submission(s): $p_ac_sub";?></span>
		</div><br><br>
		
		<div class=panel_title align=left>Problem Description</div>
		<div class=panel_content><pre><?php echo $p_desciption?></pre></div><br>
		
		<div class=panel_title align=left>Input</div> 
		<div class=panel_content><pre><?php echo $p_input?></pre></div><br>
		
		<div class=panel_title align=left>Output</div> 
		<div class=panel_content><pre><?php echo $p_output?></pre></div><br>
		
		<div class=panel_title align=left>Sample Input</div>
		<div class=panel_content><div style="font-family:Courier New,Courier,monospace;"><pre><?php echo $p_sam_input;?></pre></div></div><br>
		
		<div class=panel_title align=left>Sample Output</div>
		<div class=panel_content><div style="font-family:Courier New,Courier,monospace;"><pre><?php echo $p_sam_output;?></pre></div></div><br>
		
		<div class=panel_title align=left>Author</div> 
		<div class=panel_content><?php echo $p_author;?></div><br>
		
		<center style='font-size:15px;font-family:Arial;font-weight:bold;color:#1A5CC8'> <?php echo " 
			<a href=\"statistic.php?pid=". $p_pid ."\">Statistic</a>&nbsp;|&nbsp;
			<a href=\"submit.php?pid=". $p_pid ."\">Submit</a>
		"?></center>
	</div>
</div>


<?php 
require_once ('include/footer.php');
?>
</body>
</html>