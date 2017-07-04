<?php
class stats extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url','html'));
		$this->load->library('session');
		$this->load->database();
		$this->load->model('user_model','stats_model');
	}
	
	function index()
	{
		$details = $this->user_model->get_user_by_id($this->session->userdata('uid'));
		$data['uname'] = $details[0]->first_name . " " . $details[0]->last_name;
		$data['uemail'] = $details[0]->email;
		$this->load->view('stats_view', $data);
	}
	function view($link_id)
	{
		$details = $this->user_model->get_user_by_id($this->session->userdata('uid'));
		$data['uname'] = $details[0]->first_name . " " . $details[0]->last_name;
		$data['uemail'] = $details[0]->email;
		$this->load->view('stats_view', $data);
	}
}