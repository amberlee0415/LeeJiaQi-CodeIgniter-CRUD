<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'auto_increment' => true,
                'constraint' => 10
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => false
            ],

         
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable(('users'));
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
