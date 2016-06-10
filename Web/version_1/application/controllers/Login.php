<?php
class Login extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
	}
	
	/*
	 * 当用户点击登陆按钮或确认登陆时调用
	 */
	public function sign_in() {	
	    $this->load->helper('form');
	    $this->load->library('form_validation');
	
	    $data['title'] = 'Login Page';
	
	    $this->form_validation->set_rules('username', 'Username', 'required');
	    $this->form_validation->set_rules('password', 'Password', 'required');
	
	    if ($this->form_validation->run() === FALSE)
	    {
			$this->load->view('templates/header', $data);
			$this->load->view('p_login');
			$this->load->view('templates/footer');
	    }
	    else
	    {
	    	$username = $this->input->post('username');
	    	$password = $this->input->post('password');
	    	$this->load->model('user_model');
	    	$ret = $this->user_model->check_login($username, $password);
	    	if($ret) {
	    		$_SESSION['username'] = $username;
				redirect(key_exists('lasturl', $_SESSION) ? $_SESSION['lasturl'] : base_url());
	    	}
	        else {
				redirect('index.php/login/sign_in');
	        }
	    }
	}
	
	public function sign_out() {
		$_SESSION['username'] = NULL;
		redirect(key_exists('currenturl', $_SESSION) ? $_SESSION['currenturl'] : base_url());
	}
}