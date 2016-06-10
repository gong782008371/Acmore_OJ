<?php

class Submit extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
	}
	
	public function index() {
		$this->submit_code();
	}
	
	public function submit_code($pid=NULL, $cid=0) {
		// check login
		if($_SESSION['username'] == NULL) {
			$_SESSION['currenturl'] = "index.php/submit/submit_code/$pid/$cid";
			redirect('index.php/login/sign_in');
		}
		
		//submit code
	    $this->load->helper('form');
	    $this->load->library('form_validation');
	
	    $data['title'] = 'Login Page';
	
	    $this->form_validation->set_rules('problem_id', 'Problem_ID', 'required');
	    $this->form_validation->set_rules('language', 'Language', 'required');
	    $this->form_validation->set_rules('code', 'Code', 'required');
	    
	    $data['pid'] = $pid;
	
	    if ($this->form_validation->run() === FALSE)
	    {
			$this->load->view('templates/header', $data);
			$this->load->view('p_submit', $data);
			$this->load->view('templates/footer');
	    }
	    else
	    {
	    	$username 	= $_SESSION['username'];
	    	$pid		= $this->input->post('problem_id');
	    	$language	= $this->input->post('language');
	    	$code 		= $this->input->post('code');
	    	$contest_id = $cid;
	    	
	    	$this->load->model('solution_model');
	    	$ret = $this->solution_model->submit_code($username, $pid, $language, $code, $contest_id);
	    	redirect('index.php/status/');
	    }
	} 
}