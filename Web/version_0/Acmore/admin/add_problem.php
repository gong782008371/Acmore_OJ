<?php require_once 'pre_operate.php'; ?>

<html>
<head lang="en">
	<meta charset="UTF-8">
	<title>Add Problem | Acmore</title>
	<meta name="viewport"
	content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta name="format-detection" content="telephone=no">
	<meta name="renderer" content="webkit">
	<link rel="alternate icon" type="image/png"
	href="../assets/i/favicon.png">
	<link rel="stylesheet" href="../assets/css/amazeui.min.css" />
	<script type="text/javascript">
	function oncheck() {
		var title 			= document.getElementById("title").value;
		var other_time		= document.getElementById("other_time_limit").value;
		var other_memory	= document.getElementById("other_memory_limit").value;
		var java_time		= document.getElementById("java_time_limit").value;
		var java_memory		= document.getElementById("java_memory_limit").value;
		var description 	= document.getElementById("description").value;
		var input			= document.getElementById("input").value;
		var output 			= document.getElementById("output").value;
		var sample_input	= document.getElementById("sample_input").value;
		var sample_output 	= document.getElementById("sample_output").value;
		if(title=="" || description=="" || input=="" || output=="" || sample_output==""
			|| other_time=="" || other_memory==""
			|| java_time=="" || java_memory=="" ) {
				return false;
		}
		return true;
	}
	</script>
	<style type="text/css">
	table {
		border-collapse:   separate;   
		border-spacing:   5px;
	}
	</style>
</head>

<body>

<div class="am-g">
	<div class="am-u-lg-6 am-u-sm-9 am-u-sm-centered">
		<h2 align="center">Add Problem</h2>
		<hr>
		<form class="am-form" onsubmit="return oncheck()" action="/Acmore/admin/php_mysql.php?action=add_problem" method="post" >
			<table>
			<tr><td><label class="text">Title</label></td>
			<td><input style="width:100%;" name="title" id="title"/></td></tr>
			
			<tr><td><label class="text">Author</label></td>
			<td><input style="width:100%;" name="author" id="author" value="yuquanac"/></td></tr>
			
			<tr><td><label class="text">Time Limit</label></td>
			<td>
				<input style="width:25%;" value="1" name="other_time_limit" id="other_time_limit"/>
				<span style="font-family:Courier New;">S</span>
				
				<label align="right" style="width:35%;" class="text">Memory Limit</label>
				<input style="width:25%;" value="32" name="other_memory_limit" id="other_memory_limit"/>
				<span style="font-family:Courier New;">MB</span>
			</td></tr>
			
			<tr><td width="100px"><label class="text">Java Time</label></td>
			<td>
				<input style="width:25%;" value="2" name="java_time_limit" id="java_time_limit"/>
				<span style="font-family:Courier New;">S</span>
				
				<label align="right" style="width:35%;" class="text">Java Memory</label>
				<input style="width:25%;" value="64" name="java_memory_limit" id="java_memory_limit"/>
				<span style="font-family:Courier New;">MB</span>
			</td></tr>
			</table>
			
			<label class="text">Description</label><br>
			<textarea rows="7" style="width:100%" name="description" id="description"></textarea>

			<label class="text">Input</label><br>
			<textarea rows="7" style="width:100%" name="input" id="input"></textarea>

			<label class="text">Output</label><br>
			<textarea rows="7" style="width:100%" name="output" id="output"></textarea>

			<label class="text">Sample Input</label><br>
			<textarea rows="5" style="width:100%" name="sample_input" id="sample_input"></textarea>

			<label class="text">Sample Output</label><br>
			<textarea rows="5" style="width:100%" name="sample_output" id="sample_output"></textarea><br>

			<input type="submit" name="" value="Confirm Add" class="am-btn am-btn-primary am-btn-sm am-fr">
		</form>
	</div>
</div>
<?php require_once '../include/footer.php';?>
</body>
</html>
