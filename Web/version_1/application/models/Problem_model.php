<?php
class Problem_model extends CI_Model {

	public function __construct() {
		$this->load->database();
	}
	
	/*
	 * 返回最大的页码(每页10条记录)
	 */
	public function get_problem_page() {
		$sql = "
			SELECT MAX(problem_id) as mx_id
			FROM problems";
		$query = $this->db->query($sql);
		return ($query->row()->mx_id - 1000) / 5; 
	}
	
	// 查询pid为[$lower_bound_id, $upper_bound_id)的题目
	public function get_problem($lower_bound_id, $upper_bound_id, $order="ASC") {
		$problems = array(); 
		$sql = "
			SELECT problem_id, title, accept_submit, total_submit,visiable 
			FROM problems 
			WHERE problem_id >= $lower_bound_id AND problem_id < $upper_bound_id
			ORDER BY problem_id $order";
		$query = $this->db->query($sql);
		if ($query && $query->num_rows() > 0) {
			foreach ($query->result_array() as $row) {
				$p = array();
				$p["title"] 	= $this->trans_to_php_fmt($row["title"]);
				$p["accept"] 	= $this->trans_to_php_fmt($row["accept_submit"]);
				$p["total"] 	= $this->trans_to_php_fmt($row["total_submit"]); 
				$p["visiable"] 	= $this->trans_to_php_fmt($row["visiable"]); 
				$problems[$row["problem_id"]] = $p;
			}
		}
		return $problems;
	}
	
	public function get_problem_content($pid) {
		$problem = Array();
		
		$problem['p_pid']			= 1000;
		$problem['p_title'] 		= "A + B";
		$problem['p_time_java'] 	= 2000;
		$problem['p_time_other'] 	= 1000;
		$problem['p_mem_java'] 		= 65536;
		$problem['p_mem_other']		= 32768;
		$problem['p_total_sub']		= 566399;
		$problem['p_ac_sub']		= 179834;
		$problem['p_desciption']	= "Calculate <i>A + B</i>.";
		$problem['p_input']			= "Each line will contain two integers <i>A</i> and <i>B</i>. Process to end of file.";
		$problem['p_output']		= "For each case, output <i>A + B</i> in one line.";
		$problem['p_sam_input']		= "1 1";
		$problem['p_sam_output']	= "2";
		$problem['p_author']		= "yuquanac";
		
		$sql = "
		select problem_id, title, java_time, other_time, java_mem, other_mem, description, input, output, sample_input, sample_output, hint, author, total_submit, accept_submit 
		from problems 
		where problem_id = " .$pid;
		
		$query = $this->db->query($sql);
		if ($query && $query->num_rows() > 0) {
			foreach ($query->result_array() as $row) {
				$problem['p_pid']			= $row["problem_id"];
				$problem['p_title'] 		= $row["title"];
				$problem['p_time_java'] 	= $row["java_time"] * 1000;
				$problem['p_time_other'] 	= $row["other_time"] * 1000;
				$problem['p_mem_java'] 		= $row["java_mem"] * 1024;
				$problem['p_mem_other']		= $row["other_mem"] * 1024;
				$problem['p_total_sub']		= $row["total_submit"];
				$problem['p_ac_sub']		= $row["accept_submit"];
				$problem['p_desciption']	= $row["description"];
				$problem['p_input']			= $row["input"];
				$problem['p_output']		= $row["output"];
				$problem['p_sam_input']		= $row["sample_input"];
				$problem['p_sam_output']	= $row["sample_output"];
				$problem['p_author']		= $row["author"];
			}
		}
		return $problem;
	}
	
	public function get_max_problem_id() {
		$sql = "
			SELECT MAX(problem_id) as max_id 
			FROM problems ";
		$query = $this->db->query($sql);
		if(!$query || $query->num_rows() <= 0) {
			return 0;
		}
		return $query->row()->max_id;
	} 
	
	public function change_visiable_of_problem($pid, $ori_status='N') {
		$new_status = ($ori_status=='N' ? 'Y' : 'N');
		$sql = "
			UPDATE problems 
			SET visiable='$new_status' 
			WHERE problem_id=$pid";
		$query = $this->db->query($sql);
		if(!$query) {
			return false;
		}
		return true;
	}
	
	public function delete_problem($pid) {
		$sql = "
			DELETE 
			FROM problems 
			WHERE problem_id=$pid";
		$query = $this->db->query($sql);
		if(!$query) {
			return false;
		}
		return true;
	}
	
	// return problem_id of new problem
	public function add_problem($problem) {
		$p_title 		= $this->trans_to_mysql_fmt($problem["title"]);
		$p_time_java 	= ($problem["java_time_limit"]);
		$p_time_other 	= ($problem["other_time_limit"]);
		$p_mem_java 	= ($problem["java_memory_limit"]);
		$p_mem_other	= ($problem["other_memory_limit"]);
		$p_desciption	= $this->trans_to_mysql_fmt($problem["description"]);
		$p_input		= $this->trans_to_mysql_fmt($problem["input"]);
		$p_output		= $this->trans_to_mysql_fmt($problem["output"]);
		$p_sam_input	= $this->trans_to_mysql_fmt($problem["sample_input"]);
		$p_sam_output	= $this->trans_to_mysql_fmt($problem["sample_output"]);
		$p_author		= $this->trans_to_mysql_fmt($problem["author"]=="" ? "yuquanac" : $_POST["author"]);
		
		$sql = "
			INSERT 
			INTO problems(title, java_time, other_time, java_mem, other_mem, description, input, output, sample_input, sample_output, author) 
			value('$p_title', $p_time_java, $p_time_other, $p_mem_java, $p_mem_other, '$p_desciption', '$p_input', '$p_output', '$p_sam_input', '$p_sam_output', '$p_author')";
		$query = $this->db->query($sql);
		if(!$query) {
			return false;
		}
		
		$sql = "
			SELECT problem_id 
			FROM problems 
			WHERE title='$p_title' AND description='$p_desciption'";
		$query = $this->db->query($sql);
		if(!$query || $query->num_rows() <= 0) {
			return false;
		}
		
		return $$query->row()->problem_id;
	}
	
	public function update_problem($pid, $problem) {
		$p_title 		= $this->trans_to_mysql_fmt($problem["title"]);
		$p_time_java 	= ($problem["java_time_limit"]);
		$p_time_other 	= ($problem["other_time_limit"]);
		$p_mem_java 	= ($problem["java_memory_limit"]);
		$p_mem_other	= ($problem["other_memory_limit"]);
		$p_desciption	= $this->trans_to_mysql_fmt($problem["description"]);
		$p_input		= $this->trans_to_mysql_fmt($problem["input"]);
		$p_output		= $this->trans_to_mysql_fmt($problem["output"]);
		$p_sam_input	= $this->trans_to_mysql_fmt($problem["sample_input"]);
		$p_sam_output	= $this->trans_to_mysql_fmt($problem["sample_output"]);
		$p_author		= $this->trans_to_mysql_fmt($problem["author"]=="" ? "yuquanac" : $_POST["author"]);
		
		$sql = "
			UPDATE problems 
			SET title='$p_title', java_time=$p_time_java, other_time=$p_time_other, java_mem=$p_mem_java, other_mem=$p_mem_other, description='$p_desciption', input='$p_input', output='$p_output', sample_input='$p_sam_input', sample_output='$p_sam_output', author='$p_author')  
			WHERE problem_id=$pid";
		$query = $this->db->query($sql);
		if($query) {
			return true;
		}
		return false;
	}

	public function exist_problem($pid) {
		$sql = "
			SELECT COUNT(problem_id) 
			FROM problems 
			WHERE problem_id=$pid";
		$query = $this->db->query($sql);
		if($query && ($query->num_rows() > 0)) {
			return true;
		}
		return false;
	}
	
	public function get_problem_title($pid) {
		$sql = "
			SELECT title 
			FROM problems 
			WHERE problem_id=$pid";
		$query = $this->db->query($sql);
		if($query && ($query->num_rows() > 0)) {
			return $this->trans_to_php_fmt($query->row()->title);
		}
		return false;
	}
	
	function trans_to_mysql_fmt($str) {
		return addslashes($str);
	}
	
	function trans_to_php_fmt($str) {
		return stripslashes($str);
	}
}