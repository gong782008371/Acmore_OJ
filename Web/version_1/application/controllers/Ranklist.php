<?php
class Ranklist extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
	}
	
	public function index() {
		$this->page(0);
	}
	
	public function page($page) {
		if (!key_exists('username', $_SESSION)) {
			$_SESSION['username'] = NULL;
		}
		
		$this->load->model('user_model');
		
	    $data['title'] = 'User Ranklist';
	    $data['max_page'] = $this->user_model->get_count_user() / 10;
	    $data['cur_page'] = $page;
	    $data['users'] = $this->user_model->get_ranked_user_info($page * 10, 10);
	    
	    $this->load->view('templates/header', $data);
		$this->load->view('p_ranklist', $data);
		$this->load->view('templates/footer');
	}
	
}