<?php
class U extends CI_Controller
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

    }
}