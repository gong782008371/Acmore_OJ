<link href="<?php echo base_url();?>assets/rainbow/themes/blackboard.css" rel="stylesheet" type="text/css" media="screen">
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
			<span style="font-size:40;color:#1A5CC8;font-family:Courier New;font-weight:bold;">View Code</span>
		</div>
		<hr>
		<div align="center" style="font-family:Arial">
			<span style="font-size:14;color:green;font-weight:bold;">
				<?php echo "Problem:" .$solution['problem_id'] ."&nbsp;&nbsp;&nbsp;&nbsp;Status:".$result_name[$solution['result']]."<br>";?>
				<?php echo "RunID:" .$solution['solution_id'] ."&nbsp;&nbsp;&nbsp;&nbsp;Language:" .$language_name[$solution['language']] ."&nbsp;&nbsp;&nbsp;&nbsp;Author:" .$solution['username'];?>
			</span>
		</div><br>
		<div>
			<pre><code data-language="c"><?php echo $code; ?>
			</code></pre>
		</div>
		<hr>
	</div>
</div>

<script src="<?php echo base_url();?>assets/rainbow/js/rainbow.js"></script>
<script src="<?php echo base_url();?>assets/rainbow/js/language/generic.js"></script>
<script src="<?php echo base_url();?>assets/rainbow/js/language/c.js"></script>
<script src="<?php echo base_url();?>assets/rainbow/js/language/java.js"></script>