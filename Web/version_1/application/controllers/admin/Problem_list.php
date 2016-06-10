<?php
class Problem_list extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
	}
	
	public function index() {
		$this->load->model('problem_model');
		$_SESSION['max_pid'] = $this->problem_model->get_max_problem_id();
		$this->page($_SESSION['max_pid']);
	}
	
	public function page($head) {
		$this->load->model('problem_model');
		if (!key_exists('max_pid', $_SESSION) || $_SESSION['max_pid'] == NULL) {
			$_SESSION['max_pid'] = $this->problem_model->get_max_problem_id();
		}
		
		if($head < 1000 || $head > $_SESSION['max_pid']) {
			$head = $_SESSION['max_pid'];
		}
		
		$data['title'] = "Problem List";
		$data['head']  = $head;
		$data['page_cnt'] = 5;
		$data['problems'] = $this->problem_model->get_problem($head - $data['page_cnt'] + 1, $head + 1, "DESC");
		
		$this->load->view('admin/header', $data);
		$this->load->view('admin/p_problem_list', $data);
		$this->load->view('admin/footer');
	}
	
	public function change_visiable($pid, $ori_status='N') {
		$this->load->model('problem_model');
		$this->problem_model->change_visiable_of_problem($pid, $ori_status);
		redirect(key_exists('currenturl', $_SESSION) ? $_SESSION['currenturl'] : base_url());
	}
	
	public function delete_problem($pid) {
		$this->load->model('problem_model');
		$this->problem_model->delete_problem($pid);
		redirect(key_exists('currenturl', $_SESSION) ? $_SESSION['currenturl'] : base_url());
	}
}