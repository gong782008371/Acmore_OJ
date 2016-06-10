<?php
class Problem extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
	}
	
	public function index() {
		$this->page(0);
	}
	
	public function page($pid) {
		if (!key_exists('username', $_SESSION)) {
			$_SESSION['username'] = NULL;
		}
		
		$this->load->model('problem_model');
		
	    $lower_bound_id = 1000 + $pid * 5;
		$upper_bound_id = $lower_bound_id + 5;
		
	    $data['title'] = 'Problem List';
	    $data['max_page'] = $this->problem_model->get_problem_page();
	    $data['problems'] = $this->problem_model->get_problem($lower_bound_id, $upper_bound_id);
	    $data['cur_page'] = $pid;
	    if(key_exists('username', $_SESSION) && $_SESSION['username'] != NULL) {
	    	$this->load->model('solution_model');
			$data['status'] = $this->solution_model->get_status_by_username($lower_bound_id, $upper_bound_id, $_SESSION['username']);
	    }
	    
	    
		$this->load->view('templates/header', $data);
		$this->load->view('p_problem', $data);
		$this->load->view('templates/footer');
	}
	
	public function show_problem($pid) {
		if (!key_exists('username', $_SESSION)) {
			$_SESSION['username'] = NULL;
		}
		
		$this->load->model('problem_model');
		
	    $data['title'] = 'Problem - '.$pid;
		$data['problem'] = $this->problem_model->get_problem_content($pid);
		
		$this->load->view('templates/header', $data);
		$this->load->view('p_show_problem', $data);
		$this->load->view('templates/footer');
	}
}