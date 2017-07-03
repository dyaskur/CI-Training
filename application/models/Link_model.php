<?php
/**
 * Created by PhpStorm.
 * User: ss
 * Date: 03/07/17
 * Time: 12:48
 */
class Link_model extends CI_Model {

    public $user_id;
    public $link;
    public $code;
    public $expired;

    public function get_last_ten_entries()
    {
        $query = $this->db->get('entries', 10);
        return $query->result();
    }

    public function insert_entry($link, $code)
    {
        $this->user_id    = $this->session->userdata('uid'); // please read the below note
        $this->link    = $link; // please read the below note
        $this->code    = $code; // please read the below note
        $expired = time() + (24 * 60 * 60);

        $this->expired    = $expired; // please read the below note


        $this->db->insert('link', $this);
        return true;
    }


}