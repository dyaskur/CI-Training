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
}