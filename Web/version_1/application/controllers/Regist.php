<?php
class Regist extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
	}
	
	public function sign_up() {
	    $this->load->helper('form');
	    $this->load->library('form_validation');
	
	    $data['title'] = 'Regist Page';
	
	    $this->form_validation->set_rules('username', 'Username', 'required');
	    $this->form_validation->set_rules('password', 'Password', 'required');
	
	    if ($this->form_validation->run() === FALSE)
	    {
			$this->load->view('templates/header', $data);
			$this->load->view('p_regist');
			$this->load->view('templates/footer');
	    }
	    else
	    {
	    	$username = $this->input->post('username');
	    	$password = $this->input->post('password');
	    	$email	  = $this->input->post('email');
	    	$school   = $this->input->post('school');
	    	$motto    = $this->input->post('motto');
	    	
	    	$this->load->model('user_model');
	    	$ret = $this->user_model->sign_up($username, $password, $email, $school, $motto);
	    	if($ret) {
	    		$_SESSION['username'] = $username; 
				redirect(key_exists('lasturl', $_SESSION) ? $_SESSION['lasturl'] : base_url());
	    	}
	        else {
				redirect('index.php/regist/sign_up');
	        }
	    }
	}
}