<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_User extends CI_Migration {

    public function up()
    {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'username' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'pass' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'email' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'first_name' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'last_name' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'created' => array(
                'type' => 'INT',
            ),
            'updated' => array(
                'type' => 'INT',
            ),
            'deleted' => array(
                'type' => 'INT',
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('user');
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
        $this->dbforge->drop_table('user');
        $this->dbforge->drop_table('link');
        $this->dbforge->drop_table('stats');

    }
}

