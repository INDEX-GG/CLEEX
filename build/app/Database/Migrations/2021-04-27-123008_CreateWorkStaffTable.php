<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateWorkStaffTable extends Migration
{
    public function up()
    {
        $this->forge->addField(
            [
                'id' => [
                    'type' => 'INT',
                    'unsigned' => true,
                    'auto_increment' => true,
                ],
                'status' => [
                    'type' => 'BOOL',
                    'default'=> false,
                ],
                'start_work' => [
                    'type' => 'TIME',
                    'default'=> null,
                ],
                'end_work' => [
                    'type' => 'TIME',
                    'default'=> null,
                ],
                'date' => [
                    'type' => 'DATE',
                    'default'=> null,
                ],
                'staff_id' => [
                    'type' => 'INT',
                    'unsigned' => true,
                    'default'=> null,
                ],
                'place_id' => [
                    'type' => 'INT',
                    'unsigned' => true,
                    'default'=> null,
                ],

            ]);
        $this->forge->addKey('id', true,true);
        $this->db->disableForeignKeyChecks();
        $this->forge->addForeignKey('staff_id', 'staff', 'id', 'CASCADE', 'NO ACTION');
        $this->forge->addForeignKey('place_id', 'place', 'id', 'CASCADE', 'NO ACTION');
        $this->forge->createTable('work_staff');
        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('work_staff');
    }
}