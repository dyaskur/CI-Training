<?php
/**
 * Created by PhpStorm.
 * User: ss
 * Date: 03/07/17
 * Time: 11:40
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {

    public $username;
    public $password;
    public $email;
    public $first_name;
    public $last_name;
    public $created;
    public $updated;
    public $deleted;


    function get_user($email, $pwd)
    {
        $this->db->where('email', $email);
        $this->db->where('pass', $pwd);
        $query = $this->db->get('user');
        return $query->result();
    }

    // get user
    function get_user_by_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('user');
        return $query->result();
    }

    public function insert_user($data)
    {


        $this->db->insert('user', $data);
    }

    public function update_user()
    {
        $this->username    = $_POST['username']; // please read the below note
        $this->password  = $_POST['password'];
        $this->email     = $_POST['email'];
        $this->first_name     = $_POST['first_name'];
        $this->last_name     = $_POST['last_name'];

        $this->db->update('user', $this, array('id' => $_POST['id']));
    }
    public function delete_user()
    {

        $this->deleted     = time();

        $this->db->update('user', $this, array('id' => $_POST['id']));
    }

}