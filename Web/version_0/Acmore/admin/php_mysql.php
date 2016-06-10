<?php
require_once '../include/db_info.php';


function add_problem(){
	//$p_pid			= 1000;
	$p_title 		= trans_to_mysql_fmt($_POST["title"]);
	$p_time_java 	= ($_POST["java_time_limit"]);
	$p_time_other 	= ($_POST["other_time_limit"]);
	$p_mem_java 	= ($_POST["java_memory_limit"]);
	$p_mem_other	= ($_POST["other_memory_limit"]);
	$p_desciption	= trans_to_mysql_fmt($_POST["description"]);
	$p_input		= trans_to_mysql_fmt($_POST["input"]);
	$p_output		= trans_to_mysql_fmt($_POST["output"]);
	$p_sam_input	= trans_to_mysql_fmt($_POST["sample_input"]);
	$p_sam_output	= trans_to_mysql_fmt($_POST["sample_output"]);
	$p_author		= trans_to_mysql_fmt($_POST["author"]=="" ? "yuquanac" : $_POST["author"]);
	
	$sql = "
		INSERT 
		INTO problems(title, java_time, other_time, java_mem, other_mem, description, input, output, sample_input, sample_output, author) 
		value('$p_title', $p_time_java, $p_time_other, $p_mem_java, $p_mem_other, '$p_desciption', '$p_input', '$p_output', '$p_sam_input', '$p_sam_output', '$p_author')";
	if( $GLOBALS["conn"]->query($sql) !== TRUE ) {
		die("insert failed with sql:" . $sql);
	}
	
	$sql = "
		SELECT problem_id 
		FROM problems 
		WHERE title='$p_title' AND description='$p_desciption'";
	$result = $GLOBALS["conn"]->query($sql);
	if(!$result) {
		header("Location: /Acmore/admin/");
		exit(0);
	}
	$row = $result->fetch_assoc();
	header("Location: /Acmore/admin/modify_data.php?problem_id=" .$row["problem_id"] ."&title=$p_title");
	exit(); 
}

function modify_data() {
	
}

switch ($_REQUEST["action"]) {
	case "add_problem": add_problem(); break;
	case "modify_data": modify_data(); break;
	default: break;
}
