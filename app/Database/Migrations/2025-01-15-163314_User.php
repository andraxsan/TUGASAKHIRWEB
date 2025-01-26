<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_user' => [
                'type'              => 'INT',
                'constraint'        => '5',
                'unsigned'          => true,
                'auto_increment'    => true,
            ],
            'username' => [
                'type'              => 'VARCHAR',
                'constraint'        => '255',
                'unique'            => true,
            ],
            'password' => [
                'type'              => 'VARCHAR',
                'constraint'        => '255',
            ],
            'level' => [
                'type'              => 'ENUM',
                'constraint'        => ['admin','guru','siswa']
            ]
            ]);
            $this->forge->addKey('id_user', TRUE);
            $this->forge->createTable('user');
    }

    public function down()
    {
        $this->forge->dropTable('user');
    }
}
