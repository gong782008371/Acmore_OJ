<?php
class Home extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
	}
	
	public function index() {
		
		$data['title'] = "Admin Page";
		
		$this->load->view('admin/header', $data);
		$this->load->view('admin/p_home');
		$this->load->view('admin/footer');
	}
}