<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateStaffTable extends Migration
{
    public function up()
    {
        $this->forge->addField(
            [
                'id'=>[
                    'type'=>'INT',
                    'unsigned'   => true,
                    'auto_increment' => true,
                ],
                'place_id'=>[
                    'type'=>'INT',
                    'unsigned'   => true,
                    'default'=>false,
                ],
                'default_stuff'=>
                [
                    'type'=>'BOOL',
                    'default'=> null,
                ],
                'name'=>[
                    'type'=>'VARCHAR',
                    'constraint' => '100',
                    'default'=> null,
                ],
                'nickname' => [
                    'type' => 'VARCHAR',
                    'constraint' => '30',
                    'default'=> null,
                ],
                'motto' => [
                    'type' => 'VARCHAR',
                    'constraint' => '255',
                    'default'=> null,
                ],
                'login' => [
                    'type' => 'VARCHAR',
                    'constraint' => '30',
                    'default'=> null,
                ],
                'password' => [
                    'type' => 'VARCHAR',
                    'constraint' => '50',
                    'default'=> null,
                ],
                'email' => [
                    'type' => 'VARCHAR',
                    'constraint' => '30',
                    'default'=> null,
                ],
                'photo' => [
                    'type' => 'VARCHAR',
                    'constraint' => '255',
                    'default'=> null,
                ],
                'date_job_begin' => [
                    'type' => 'DATE',
                    'default'=> null,
                ],
                'date_job_end' => [
                    'type' => 'DATE',
                    'default'=> null,
                ],
                'push_token' => [
                    'type' => 'VARCHAR',
                    'constraint' => '255',
                    'default'=> null,
                ],
            ]);
        $this->forge->addKey('id', true, true);
        $this->db->disableForeignKeyChecks();
        $this->forge->addForeignKey('place_id', 'place', 'id', 'CASCADE', 'NO ACTION');
        $this->forge->createTable('staff');
        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('staff');
    }
}
