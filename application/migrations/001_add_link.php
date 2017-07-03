<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_Link extends CI_Migration {

    public function up()
    {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'user_id' => array(
                'type' => 'INT',
            ),
            'code' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'link' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'expired' => array(
                'type' => 'INT',
            ),
            'created' => array(
                'type' => 'INT',
            ),
            'deleted' => array(
                'type' => 'INT',
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('link');
    }

    public function down()
    {
        $this->dbforge->drop_table('link');
    }
}

