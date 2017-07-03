<?php
class Link extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form','url','html'));
        $this->load->library(array('session', 'form_validation'));
        $this->load->database();
        $this->load->model('link_model');
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

    public function ajax_add()
    {

        // get form input
        $link = $this->input->post("link");

        // form validation
        $this->form_validation->set_rules("link", "Link", "trim|required|valid_url");


        if ($this->form_validation->run() == FALSE)
        {
            // validation fail
            echo "Fail";
        }
        else
        {
            $code= substr(md5(rand()), 0, 8);

            if ($this->link_model->insert_entry($link,$code))
            {
echo base_url()."u/".$code;
            }
            else
            {
                // error
  echo "error please try again";
            }
        }
    }
    public function pergi($code)
    {
       $link =  $this->link_model->get_link_bycode($code);
        redirect($link[0]->link);

    }
    function add()
    {
        $details = $this->user_model->get_user_by_id($this->session->userdata('uid'));
        $data['uname'] = $details[0]->first_name . " " . $details[0]->last_name;
        $data['uemail'] = $details[0]->email;
        $this->load->view('profile_view', $data);
    }
}