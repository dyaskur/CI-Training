<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datatable extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('datatable_model','datatable');
    }

    public function index()
    {
        $this->load->helper('url');
        $this->load->view('link_view');
    }

    public function ajax_list()
    {
        $list = $this->datatable->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $link) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $link->link;
            $row[] = $link->code;
            $row[] = "view";

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->datatable->count_all(),
            "recordsFiltered" => $this->datatable->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }


}