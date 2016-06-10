<script type="text/javascript">
function on_check_input() {
	if (document.getElementById("code").value.length < 20) {
		alert("code is too short.");
		return false;
	} 
	return true;
}
</script>

<div class="am-g">
<div class="am-u-lg-7 am-u-sm-7 am-u-sm-centered">
<h2 align="center">Submit Your Code</h2>
<hr>
<p><font color="red"><?php echo validation_errors(); ?></font></p>
<form id="h-form-code-editor" onsubmit="return on_check_input()" class="form-horizontal" action="submit_code" method="post" >
	<header class="tl-code-editor-toolbar clearfix">
		<label>Problem ID</label>
		<input name="problem_id" id="problem_id" value='<?php echo $pid; ?>'/>
		<select name="language" id="language" class="tl-code-editor-lang h-select-lang">
			<option value=1 >G++</option>
			<!-- <option value="2" >Java</option> -->
		</select>
	</header>
	<textarea rows="15" style="width:100%" name="code" id="code"></textarea><br>
	<footer class="tl-code-editor-footer clearfix">
		<div align="center">
			<button type="submit" class="am-btn am-btn-primary am-radius">Submit</button>
		</div>
	</footer>
</form>
<hr>
</div>
</div>
