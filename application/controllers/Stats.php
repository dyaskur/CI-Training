<?php
class stats extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url','html'));
		$this->load->library('session');
		$this->load->database();
		$this->load->model('stat_model');
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
		$data['link_id'] = $link_id;
		$this->load->view('stats_view', $data);
	}
    public function ajax_list($link_id)
    {
        $list = $this->stat_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $link) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $link->browser;
            $row[] = $link->ip;
            $row[] = "view";

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->stat_model->count_all(),
            "recordsFiltered" => $this->stat_model->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

}