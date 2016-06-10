<?php
class Problem extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
	}
	
	public function add_problem() {
		$this->load->helper('form');
	    $this->load->library('form_validation');
		
		$data['title'] = "Add Problem";

	    $this->form_validation->set_rules('title', 				'Title', 			'required');
	    $this->form_validation->set_rules('description', 		'Description', 		'required');
	    $this->form_validation->set_rules('input', 				'Input', 			'required');
	    $this->form_validation->set_rules('output', 			'Output', 			'required');
	    $this->form_validation->set_rules('sample_output', 		'Sample Output', 	'required');
	    $this->form_validation->set_rules('other_time_limit', 	'Other Time', 		'required');
	    $this->form_validation->set_rules('java_time_limit',	'Java Time', 		'required');
	    $this->form_validation->set_rules('other_memory_limit',	'Other Memory', 	'required');
	    $this->form_validation->set_rules('java_memory_limit',	'Java Memory', 		'required');
	
	    if ($this->form_validation->run() === FALSE) {
			$this->load->view('admin/header', $data);
			$this->load->view('admin/p_add_problem');
			$this->load->view('admin/footer');
	    }
		
	    else {
	    	$this->load->model('problem_model');
	    	$ret = $this->problem_model->add_problem($_POST);
	    	if($ret) {
				redirect(base_url()."index.php/admin/problem/modify_data/$ret");
	    	}
	        else {
				$data['error_info'] = "Some error occured when add problem.";
				$this->load->view('templates/header', $data);
				$this->load->view('p_error_message', $data); 
				$this->load->view('templates/footer');
				return ;
	        }
	    }
	}
	
	public function edit_problem($pid) {
		$this->load->model('problem_model');
		if (!($this->problem_model->exist_problem($pid))) {
			$data['error_info'] = "Do not exists problem with ID($pid).";
			$this->load->view('templates/header', $data);
			$this->load->view('p_error_message', $data); 
			$this->load->view('templates/footer');
			return ;
		}
	
		$this->load->helper('form');
	    $this->load->library('form_validation');
	    $this->load->model('problem_model');
		
		$data['title'] = "Edit Problem";
		$data['problem'] = $this->problem_model->get_problem_content($pid);

	    $this->form_validation->set_rules('title', 				'Title', 			'required');
	    $this->form_validation->set_rules('description', 		'Description', 		'required');
	    $this->form_validation->set_rules('input', 				'Input', 			'required');
	    $this->form_validation->set_rules('output', 			'Output', 			'required');
	    $this->form_validation->set_rules('sample_output', 		'Sample Output', 	'required');
	    $this->form_validation->set_rules('other_time_limit', 	'Other Time', 		'required');
	    $this->form_validation->set_rules('java_time_limit',	'Java Time', 		'required');
	    $this->form_validation->set_rules('other_memory_limit',	'Other Memory', 	'required');
	    $this->form_validation->set_rules('java_memory_limit',	'Java Memory', 		'required');
	
	    if ($this->form_validation->run() === FALSE) {
			$this->load->view('admin/header', $data);
			$this->load->view('admin/p_edit_problem');
			$this->load->view('admin/footer');
	    }
		
	    else {
	    	$ret = $this->problem_model->update_problem($pid, $_POST);
	    	if($ret) {
				redirect(key_exists('lasturl', $_SESSION) ? $_SESSION['lasturl'] : base_url());
	    	}
	        else {
				$data['error_info'] = "Some error occured when update problem.";
				$this->load->view('templates/header', $data);
				$this->load->view('p_error_message', $data); 
				$this->load->view('templates/footer');
				return ;
	        }
	    }
		
	}
	
	public function modify_data($pid, $error="") {
		$this->load->model('problem_model');
		if (!($this->problem_model->exist_problem($pid))) {
			$data['error_info'] = "Do not exists problem with ID($pid).";
			$this->load->view('templates/header', $data);
			$this->load->view('p_error_message', $data); 
			$this->load->view('templates/footer');
			return ;
		}
		
		$this->load->helper('form');
		
		$data['title'] = "Modify Data";
		$data['problem_id'] = $pid;
		$data['problem_title'] = $this->problem_model->get_problem_title($pid);
	  	$data['error'] = $error;
		
	    if ($error=="" && key_exists('REQUEST_METHOD', $_SERVER) && $_SERVER["REQUEST_METHOD"] == "POST") {
	    	if($this->upload_file($pid)) {
	    		redirect(base_url() ."index.php/admin/problem_list/");
	    	}
	    }
	    
	    else {
			$this->load->view('admin/header', $data);
			$this->load->view('admin/p_modify_data', $data); 
			$this->load->view('admin/footer');
	    }
		
	}
	
	private function upload_file($pid) {
		if(!strstr($_FILES['file_in']['name'], '.in')) {
            $this->modify_data($pid, 'input file can not be empty and type should be *.in');
            return false;
		}
		if(!strstr($_FILES['file_out']['name'], '.out')) {
            $this->modify_data($pid, 'output file can not be empty and type should be *.out');
            return false;
		}
		if(substr($_FILES['file_in']['name'], 0, strlen($_FILES['file_in']['name']) - 3) 
			!= substr($_FILES['file_out']['name'], 0, strlen($_FILES['file_out']['name']) - 4)) {
            $this->modify_data($pid, 'input and output should have same name');
            return false;
		}
		
        // base set
        require_once 'config_data_path.php';
		$config['upload_path']  = $GLOBALS['data_path'] .$pid .'/';
		$config['max_size']     = 32 * 1024;
	
		// check folder
        if(!file_exists($config['upload_path'])) {
        	mkdir($config['upload_path']);
        }
        
		// file in
        $config['allowed_types']    = '*';
        $this->load->library('upload', $config);
	  	if ( !$this->upload->do_upload('file_in')) {
            $this->modify_data($pid, $this->upload->display_errors());
            return false;
        }
        
        // file out
        $config['allowed_types']    = 'out';
        $this->load->library('upload', $config);
	  	if ( !$this->upload->do_upload('file_out')) {
            $this->modify_data($pid, $this->upload->display_errors());
            return false;
        }
		return true;
	}
	
}