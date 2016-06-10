<?php

class Home extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
	}
	
	public function index() {
		$data['title'] = "Home Page";
		if(!key_exists('username', $_SESSION)) {
			$_SESSION['username'] = NULL;
		}
		
		$this->load->view('templates/header', $data);
		$this->load->view('p_home');
		$this->load->view('templates/footer');
	}
}