<?php

class User_model extends CI_Model {
	
	public function __construct() {
		$this->load->database();
	}
	
	public function check_login($username, $password) {
		$sql = "
			SELECT password 
			FROM users 
			WHERE username='$username'";
		$query = $this->db->query($sql);
		if($query->num_rows() <= 0 or $query->row()->password != $password) {
			return false;
		}
		return true;
	}
	
	public function has_user($username) {
		$sql = "
			SELECT username 
			FROM users 
			WHERE username='$username'";
		$query = $this->db->query($sql);
		if($query->num_rows() <= 0) {
			return false;
		}
		return true;
	}
	
	public function sign_up($username, $password, $email, $school, $motto) {
		if($this->has_user($username)) {
			return false;
		}
		$sql = "
			INSERT  
			INTO users(username, password, email, school, motto) 
			VALUE('$username', '$password', '$email', '$school', '$motto')";
		return $this->db->query($sql);
	}
	
	// 拿到用户数目
	public function get_count_user() {
		$sql = "
			SELECT COUNT(username) as count 
			FROM users 
			WHERE defunct='N'";
		$query = $this->db->query($sql);
		if(!$query) {
			return 0;
		}
		return $query->row()->count;
	}
	
	// 拿到排名后的用户，从start开始，拿num个用户信息
	public function get_ranked_user_info($start, $num) {
		$sql = "
			SELECT username, motto, solved, submit 
			FROM users 
			WHERE defunct='N' 
			ORDER BY solved DESC, submit ASC, username ASC 
			LIMIT $start, $num";
		$query = $this->db->query($sql);
		if(!$query) {
			return false;
		}
		return $query->result_array();
	}
}