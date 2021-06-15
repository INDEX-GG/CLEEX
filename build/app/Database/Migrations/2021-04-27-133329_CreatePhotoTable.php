<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePhotoTable extends Migration
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
                'place_id' => [
                    'type' => 'INT',
                    'unsigned' => true,
                    'default'=> null,
                ],
                'photo' => [
                    'type' => 'VARCHAR',
                    'constraint' => '255',
                    'default'=> null,
                ],
                'slage' => [
                    'type' => 'VARCHAR',
                    'constraint' => '255',
                    'default'=> null,
                ],
            ]);
        $this->forge->addKey('id', true, true);
        $this->db->disableForeignKeyChecks();
        $this->forge->addForeignKey('place_id', 'place', 'id', 'CASCADE', 'NO ACTION');
        $this->forge->createTable('photo');
        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('photo');
    }
}
