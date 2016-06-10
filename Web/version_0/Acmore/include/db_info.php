<?php @session_start(); 
date_default_timezone_set('prc');

static $DB_HOST="localhost";
static $DB_NAME="test";
static $DB_USER="root";
static $DB_PSWD="000000";

global $conn;

$conn = new mysqli($DB_HOST, $DB_USER, $DB_PSWD, $DB_NAME);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
mysqli_query($conn, "SET NAMES 'UTF8'"); 
mysqli_query($conn, "SET CHARACTER SET UTF8"); 
mysqli_query($conn, "SET CHARACTER_SET_RESULTS=UTF8'"); 


/*======================以下是有关php访问数据库的函数====================================*/
function trans_to_mysql_fmt($str) {
	return addslashes($str);
}
function trans_to_php_fmt($str) {
	return stripslashes($str);
}
// 检查用户名密码是否存在
function check_user($username, $password) {
	$sql = "select password from users where username='" .$username ."'";
	$result = $GLOBALS["conn"]->query($sql);
	if(!$result) {
		return false;
	}
	$row = $result->fetch_assoc();
	return $row && $row["password"] == $password;
}

// 找到最大的页码数
function problem_page_query() {
	$sql = "
		SELECT MAX(problem_id) as mx_id
		FROM problems";
	$result = $GLOBALS["conn"]->query($sql);
	if($result && ($row = $result->fetch_assoc())) {
		return ($row["mx_id"] - 1000) / $GLOBALS["page_cnt_problem"];
	}
	return 0;
}

// 查询pid为[$lower_bound_id, $upper_bound_id)的题目
function problem_query($lower_bound_id, $upper_bound_id) {
	$problems = array(); 
	$sql = "
		SELECT problem_id, title, accept_submit, total_submit 
		FROM problems 
		WHERE visiable='Y' AND problem_id >= $lower_bound_id AND problem_id < $upper_bound_id";
	$result = $GLOBALS["conn"]->query($sql);
	if ($result && $result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			$p = array();
			$p["title"] 	= trans_to_php_fmt($row["title"]);
			$p["accept"] 	= trans_to_php_fmt($row["accept_submit"]);
			$p["total"] 	= trans_to_php_fmt($row["total_submit"]); 
			$problems["" .$row["problem_id"]] = $p;
		}
	}
	return $problems;
}

// 提交代码
function submit_code($post) {
	date_default_timezone_set('prc');
	$s_problem_id 	= $post["problem_id"];
	$s_username		= trans_to_mysql_fmt($_SESSION["current_user"]["username"]);
	$s_in_date		= date('Y-m-d H:i:s',time());
	$s_language		= $post["language"];
	$s_ip 			= trans_to_mysql_fmt($_SERVER['REMOTE_ADDR']);
	$s_contest_id	= $post["contest_id"] ? $post["contest_id"] : 0;
	$sql = "
		INSERT 
		INTO solution(problem_id, username, in_date, language, ip, contest_id) 
		value($s_problem_id, '$s_username', '$s_in_date', $s_language, '$s_ip', $s_contest_id)";
	$result = $GLOBALS["conn"]->query($sql);
	if(!$result) {
		return false;
	}
	
	$sql = "
		SELECT MAX(solution_id) AS s_id  
		FROM solution  
		WHERE username='$s_username'";
	$result = $GLOBALS["conn"]->query($sql);
	$row = NULL;
	if (!$result || !($row = $result->fetch_assoc())) {
		return false;
	}
	
	$sc_solution_id = $row['s_id'];
	$sc_code 		= trans_to_mysql_fmt($post["code"]);
	$sql = "
		INSERT 
		INTO source_code(solution_id, source) 
		value($sc_solution_id, '$sc_code')";
	$result = $GLOBALS["conn"]->query($sql);
	if(!$result) {
		return false;
	}
	
	return true;
}

// 查询[lower, upper]的提交记录
// 如果都为空，则为查询最新的$page_cnt_solution条记录
function solution_query($lower, $upper) {
	$sql = "";
	if(!$lower || !$upper || $lower > $upper) {
		$sql = "
			SELECT solution_id, username, problem_id, result, memory, time, language, code_length, in_date 
			FROM solution 
			ORDER BY solution_id DESC LIMIT 10";
	}
	else {
		$sql = "
			SELECT solution_id, username, problem_id, result, memory, time, language, code_length, in_date 
			FROM solution 
			WHERE $lower <= solution_id AND solution_id <= $upper 
			ORDER BY solution_id DESC";
	}
	$solutions = array();
	$result = $GLOBALS["conn"]->query($sql);
	if ($result && $result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			$s = array();
			$s["solution_id"] 	= $row["solution_id"];
			$s["username"] 		= trans_to_php_fmt($row["username"]);
			$s["problem_id"] 	= $row["problem_id"];
			$s["result"] 		= $row["result"];
			$s["memory"] 		= $row["memory"];
			$s["time"] 			= $row["time"];
			$s["language"] 		= $row["language"];
			$s["code_length"] 	= $row["code_length"];
			$s["submit_time"] 	= $row["in_date"];
			array_push($solutions, $s);
		}
	}
	return $solutions;
}

?>