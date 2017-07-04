<?php
/**
 * Created by PhpStorm.
 * User: ss
 * Date: 03/07/17
 * Time: 12:48
 */
class Stat_model extends CI_Model {

    public $link_id;
    public $browser;
    public $ip;
    public $time;

    var $table = 'stats';
    var $column_order = array(null, 'browser','ip'); //set column field database for datatable orderable
    var $column_search = array('browser','ip'); //set column field database for datatable searchable
    var $order = array('id' => 'asc'); // default order

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    private function _get_datatables_query()
    {

        $this->db->from($this->table);

        $i = 0;

        foreach ($this->column_search as $item) // loop column
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {

                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
    public function get_last_ten_entries()
    {
        $query = $this->db->get('entries', 10);
        return $query->result();
    }
    function get_link_bycode($code)
    {
        $this->db->where('code', $code);
        $query = $this->db->get('link');
        return $query->result();
    }

    public function insert_stat($link_id)
    {

        $this->link_id  = $link_id; // please read the below note
        $this->browser    = $_SERVER["HTTP_USER_AGENT"]; // please read the below note
        $this->ip    = $_SERVER["REMOTE_ADDR"]; // please read the below note
        $expired = time();

        $this->time    = $expired; // please read the below note
        unset($this->table);

        $this->db->insert('link', $this);
        return true;
    }


}