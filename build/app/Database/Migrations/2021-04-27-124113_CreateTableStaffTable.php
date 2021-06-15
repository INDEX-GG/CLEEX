<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableStaffTable extends Migration
{
    public function up()
    {
        $this->forge->addField(
            [
                'id' => [
                    'type' => 'INT',
                    'unsigned' => true,
                    'auto_increment' => true
                ],

                'place_id' => [
                    'type' => 'INT',
                    'unsigned' => true,
                    'default'=> null,
                ],
                'tableNum' => [
                    'type' => 'INT',
                    'default'=> null,
                ],
                'staff_id' => [
                    'type' => 'INT',
                    'unsigned' => true,
                    'default'=> null,
                ],
            ]
        );
        $this->forge->addKey('id', true, true);
        $this->db->disableForeignKeyChecks();
        $this->forge->addForeignKey('staff_id', 'staff', 'id', 'CASCADE', 'NO ACTION');
        $this->forge->addForeignKey('place_id', 'place', 'id', 'CASCADE', 'NO ACTION');
        $this->forge->createTable('tableStaff');
        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('tableStaff');
    }
}
