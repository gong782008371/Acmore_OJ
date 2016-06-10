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
 
 
<div class="am-g">
	<div class="am-u-md-9 am-u-lg-centered" >
		<div align="center">
			<span style="font-size:40;color:#1A5CC8;font-family:Courier New;font-weight:bold;"><?php echo $problem['p_title']?></span>
		</div>
		<div align="center" style="font-family:Arial">
			<span style="font-size:10;color:green;font-weight:bold;"><?php echo "Time Limit: ".$problem['p_time_java']."/".$problem['p_time_other'] ."MS (Java/Others)&nbsp;&nbsp;Memory Limit: ".$problem['p_mem_java']."/".$problem['p_mem_other']." K (Java/Others)<br>Total Submission(s): ".$problem['p_total_sub']."&nbsp;&nbsp;Accepted Submission(s): ".$problem['p_ac_sub'];?></span>
		</div><br><br>
		
		<div class=panel_title align=left>Problem Description</div>
		<div class=panel_content><pre><?php echo $problem['p_desciption']?></pre></div><br>
		
		<div class=panel_title align=left>Input</div> 
		<div class=panel_content><pre><?php echo $problem['p_input']?></pre></div><br>
		
		<div class=panel_title align=left>Output</div> 
		<div class=panel_content><pre><?php echo $problem['p_output']?></pre></div><br>
		
		<div class=panel_title align=left>Sample Input</div>
		<div class=panel_content><div style="font-family:Courier New,Courier,monospace;"><pre><?php echo $problem['p_sam_input'];?></pre></div></div><br>
		
		<div class=panel_title align=left>Sample Output</div>
		<div class=panel_content><div style="font-family:Courier New,Courier,monospace;"><pre><?php echo $problem['p_sam_output'];?></pre></div></div><br>
		
		<div class=panel_title align=left>Author</div> 
		<div class=panel_content><?php echo $problem['p_author'];?></div><br>
		
		<center style='font-size:15px;font-family:Arial;font-weight:bold;color:#1A5CC8'> <?php echo " 
			<a href=\"" .base_url() ."index.php/statistic/pid/". $problem['p_pid'] ."\">Statistic</a>&nbsp;|&nbsp;
			<a href=\"" .base_url() ."index.php/submit/submit_code/". $problem['p_pid'] ."\">Submit</a>
		"?></center>
	</div>
</div>
 