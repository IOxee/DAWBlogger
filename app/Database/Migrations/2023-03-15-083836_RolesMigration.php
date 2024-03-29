<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RolesMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'auto_increment' => true
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ],
            'permissions' => [
                'type' => 'INT',
                'constraint' => '255'
            ],

            'created_at datetime default current_timestamp',
            'deleted_at datetime default null',
            'updated_at datetime default current_timestamp on update current_timestamp'
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('roles');
    }

    public function down()
    {
        $this->forge->dropTable('roles');
    }
}
