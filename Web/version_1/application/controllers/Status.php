<?php
class Status extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
	}
	
	public function index() {
		$this->load->model('solution_model');
		$_SESSION['max_sid'] = $this->solution_model->get_max_solution_id();
		$this->page($_SESSION['max_sid']);
	}
	
	public function page($head) {
		
		$this->load->model('solution_model');
		if(!key_exists('max_sid', $_SESSION)) {
			$_SESSION['max_sid'] = $this->solution_model->get_max_solution_id();
		}
		// make $head valid
		if($head < 0 || $head > $_SESSION['max_sid']) {
			$head = $_SESSION['max_sid'];
		}
		
		$data['title'] = "Status Page";
		$data['head'] = $head;
		$data['solutions'] = $this->solution_model->get_solutions($head - 10, $head);
		$data['result_name'] = Array(
			0 => "Pending", 
			1 => "Accept", 
			2 => "Presentation Error", 
			3 => "Compile Error", 
			4 => "Wrong Answer", 
			5 => "Runtime Error", 
			6 => "Time Limit Exceeded", 
			7 => "Memory Limit Exceeded", 
			8 => "Output Limit Exceeded",
			9 => "Running"
		);
		$data['language_name'] = Array(
			0 => "",
			1 => "G++",
		);
		
		
		$this->load->view('templates/header', $data);
		$this->load->view('p_status', $data);
		$this->load->view('templates/footer');
	}
	
	public function compile_info($sid) {
		$this->load->model('solution_model');
		$ret = $this->solution_model->get_compile_info($sid);
		
		$data['title'] = "Compile Info";
		if(!$ret) {
			$data['compile_info'] = "Compile error info do not exist.";
		} else {
			$data['compile_info'] = $ret;
		}
		$this->load->view('templates/header', $data);
		$this->load->view('p_compile_info', $data); 
		$this->load->view('templates/footer');
	} 
	
	public function show_code($sid) {
		$this->load->model('solution_model');
		
		$data['title'] = "Show Code";
		
		// do not exist solution
		$solution = $this->solution_model->get_solution_by_id($sid);
		if(!$solution) {
			$data['error_info'] = "Do not exist code of solution_id($sid)";
			$this->load->view('templates/header', $data);
			$this->load->view('p_error_message', $data); 
			$this->load->view('templates/footer');
			return ;
		}
		
		// do not have access to this solution
		$data['solution'] = $solution;
		if(!key_exists('username', $_SESSION) || $solution['username'] != $_SESSION['username']) {
			$data['error_info'] = "You have no access to this problem.";
			$this->load->view('templates/header', $data);
			$this->load->view('p_error_message', $data); 
			$this->load->view('templates/footer');
			return ;
		} 
		
		$data['code'] = $this->solution_model->get_code_by_id($sid); 
		$data['result_name'] = Array(
			0 => "Pending", 
			1 => "Accept", 
			2 => "Presentation Error", 
			3 => "Compile Error", 
			4 => "Wrong Answer", 
			5 => "Runtime Error", 
			6 => "Time Limit Exceeded", 
			7 => "Memory Limit Exceeded", 
			8 => "Output Limit Exceeded",
			9 => "Running"
		);
		$data['language_name'] = Array(
			0 => "",
			1 => "G++",
		);
		$this->load->view('templates/header', $data);
		$this->load->view('p_show_code', $data); 
		$this->load->view('templates/footer');
	}
}