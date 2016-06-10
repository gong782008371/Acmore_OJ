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
			<span style="font-size:40;color:#1A5CC8;font-family:Courier New;font-weight:bold;">Error Page</span>
		</div>
		<hr>
		<div class=panel_content><pre><?php echo $error_info;?></pre></div><br>
		<hr>
	</div>
</div>