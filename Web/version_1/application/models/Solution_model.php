<?php
class Solution_model extends CI_Model {

	public function __construct() {
		$this->load->database();
	}
	
	// 提交代码
	public function submit_code($username, $pid, $language, $code, $contest_id) {
		date_default_timezone_set('prc');
		$s_problem_id 	= $pid;
		$s_username		= $this->trans_to_mysql_fmt($username);
		$s_in_date		= date('Y-m-d H:i:s',time());
		$s_language		= $language;
		$s_ip 			= $this->trans_to_mysql_fmt($_SERVER['REMOTE_ADDR']);
		$s_contest_id	= $contest_id;
		$sql = "
			INSERT 
			INTO solution(problem_id, username, in_date, language, ip, contest_id) 
			value($s_problem_id, '$s_username', '$s_in_date', $s_language, '$s_ip', $s_contest_id)";
		$query = $this->db->query($sql);
		
		$sql = "
			SELECT MAX(solution_id) AS s_id  
			FROM solution  
			WHERE username='$s_username'";
		$query = $this->db->query($sql);
		if($query->num_rows() <= 0) {
			return false;
		}
		
		$sc_solution_id = $query->row()->s_id;
		$sc_code 		= $this->trans_to_mysql_fmt($code);
		$sql = "
			INSERT 
			INTO source_code(solution_id, source) 
			value($sc_solution_id, '$sc_code')";
		$query = $this->db->query($sql);
		return true;
	}
	
	// 获取最大的提交id
	public function get_max_solution_id() {
		$sql = "
			SELECT MAX(solution_id) AS s_id  
			FROM solution";
		$query = $this->db->query($sql);
		if($query->num_rows() <= 0) {
			return 0;
		}
		return $query->row()->s_id;
	}
	
	// 获取评测状态，区间(lower, upper]
	public function get_solutions($lower, $upper) {
		$sql = "";
		if(!$lower || !$upper || $lower >= $upper) {
			$sql = "
				SELECT solution_id, username, problem_id, result, memory, time, language, code_length, in_date 
				FROM solution 
				ORDER BY solution_id DESC LIMIT 10";
		}
		else {
			$sql = "
				SELECT solution_id, username, problem_id, result, memory, time, language, code_length, in_date 
				FROM solution 
				WHERE $lower < solution_id AND solution_id <= $upper 
				ORDER BY solution_id DESC";
		}
		$solutions = array();
		$query = $this->db->query($sql);
		if ($query && $query->num_rows() > 0) {
			foreach ($query->result_array() as $row) {
				$s = array();
				$s["solution_id"] 	= $row["solution_id"];
				$s["username"] 		= $row["username"];
				$s["problem_id"] 	= $row["problem_id"];
				$s["result"] 		= $row["result"];
				$s["memory"] 		= $row["memory"];
				$s["time"] 			= $row["time"];
				$s["language"] 		= $row["language"];
				$s["code_length"] 	= $row["code_length"];
				$s["submit_time"] 	= $row["in_date"];
				$solutions[$s["solution_id"]] = $s;
			}
		}
		return $solutions;
	}
	
	// 获取编译错误信息
	public function get_compile_info($sid) {
		$sql = "
			SELECT error 
			FROM compile_info 
			WHERE solution_id=$sid";
		$query = $this->db->query($sql);
		if(!$query || $query->num_rows() <= 0) {
			return false;
		}
		return $query->row()->error;
	}
	
	// 获取指定的提交记录
	public function get_solution_by_id($sid) {
		$sql = "
			SELECT solution_id, username, problem_id, result, memory, time, language, code_length, in_date 
			FROM solution 
			WHERE solution_id=$sid";
		$query = $this->db->query($sql);
		if(!$query || $query->num_rows() <= 0) {
			return false;
		}
		
		foreach ($query->result_array() as $row) {
			$s = array();
			$s["solution_id"] 	= $row["solution_id"];
			$s["username"] 		= $row["username"];
			$s["problem_id"] 	= $row["problem_id"];
			$s["result"] 		= $row["result"];
			$s["memory"] 		= $row["memory"];
			$s["time"] 			= $row["time"];
			$s["language"] 		= $row["language"];
			$s["code_length"] 	= $row["code_length"];
			$s["submit_time"] 	= $row["in_date"];
			
			return $s;
		}
		return false;
	}
	
	// 获取指定的代码
	public function get_code_by_id($sid) {
		$sql = "
			SELECT source 
			FROM source_code 
			WHERE solution_id=$sid";
		//die($sql);
		$query = $this->db->query($sql);
		if(!$query || $query->num_rows() <= 0) {
			return "";
		}
		return (htmlspecialchars($query->row()->source));
	}
	
	// 获取某一个用户[lower, upper)这些题目每道题的状态:-1未通过，0未提交，1通过
	public function get_status_by_username($lower, $upper, $username) {
		$ret = Array();
		
		for($i = $lower; $i < $upper; $i ++) {
			$ret[$i] = 0;
		}
	
		$result = $this->get_unaccept_by_username($lower, $upper, $username);
		foreach ($result as $row) {
			$ret[$row['problem_id']] = -1;
		}
	
		$result = $this->get_accept_by_username($lower, $upper, $username);
		foreach ($result as $row) {
			$ret[$row['problem_id']] = 1;
		}
		
		return $ret;
	}
	
	// 查询某一用户[lower, upper)这些题目提交了但是没有通过的所有题目ID
	public function get_unaccept_by_username($lower, $upper, $username) {
		$sql = "
			SELECT DISTINCT problem_id
			FROM solution 
			WHERE username='$username' AND $lower <= problem_id AND problem_id < $upper AND result != 1";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	
	public function get_accept_by_username($lower, $upper, $username) {
		$sql = "
			SELECT DISTINCT problem_id
			FROM solution 
			WHERE username='$username' AND $lower <= problem_id AND problem_id < $upper AND result = 1";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	
	function trans_to_mysql_fmt($str) {
		return addslashes($str);
	}
	
	function trans_to_php_fmt($str) {
		return stripslashes($str);
	}
}