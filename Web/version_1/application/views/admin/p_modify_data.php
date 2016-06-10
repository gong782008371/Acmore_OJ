  <style>
    .header {
      text-align: center;
    }
  </style>

<div class="header">
	<p style="font-size:170%;color:#1A5CC8;margin-top: 30px;"><b>Modify File</b></p>
	<p style="font-size:120%;color:blue;"><b>
		<?php
			echo "Problem " .$problem_id . " : " .$problem_title; 
		?>
	</b></p>
	<p style="font-size:14px;"><font color="red">
		Keep the corresponding field blank if you don't want to modify the data.<br>
		Be sure that the size of the data file should not be larger than 32MB.
	</font></p>
	<hr />
</div>
<div class="am-g">
<div class="am-u-lg-5 am-u-md-8 am-u-sm-centered">
	<p><font color="red"><?php echo $error; ?></font></p>
	<form method="post" class="am-form" action="<?php echo base_url()?>index.php/admin/problem/modify_data/<?php echo $problem_id;?>" enctype="multipart/form-data">
		<div class="am-form-group">
		<label for="doc-ipt-file-1">Input File:</label>
	      <input type="file" id="file_in" name="file_in">
	      <p class="am-form-help">请选择要上传的输入文件(.in)...</p>
	    </div>
		<div class="am-form-group">
		<label for="doc-ipt-file-1">Output File:</label>
	      <input type="file" id="file_out" name="file_out">
	      <p class="am-form-help">请选择要上传的输出文件(.out)...</p>
	    </div><br>
		<div class="am-cf">
			<input type="submit" name="" value="Confirm Modify" class="am-btn am-btn-primary am-btn-sm am-fr"> 
		</div>
	</form><hr>
</div>
</div>