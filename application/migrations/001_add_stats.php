<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_Stats extends CI_Migration {

    public function up()
    {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'link_id' => array(
                'type' => 'INT',
            ),
            'browser' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'ip' => array(
                'type' => 'VARCHAR',
                'constraint' => '33',
            ),
            'time' => array(
                'type' => 'INT',
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('stats');
    }

    public function down()
    {
        $this->dbforge->drop_table('stats');
    }
}

