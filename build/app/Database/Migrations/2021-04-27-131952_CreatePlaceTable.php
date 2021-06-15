<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePlaceTable extends Migration
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
                'Name'=>[
                    'type'=>'VARCHAR',
                    'constraint' => '100',
                    'default'=> null,
                ],
                'tables' => [
                    'type' => 'INT',
                    'unsigned' => true,
                    'default'=> null,
                ],
                'latitude' => [
                    'type' => 'FLOAT',
                    'constraint' => '50',
                    'default'=> null,
                ],
                'longitude' => [
                    'type' => 'FLOAT',
                    'constraint' => '50',
                    'default'=> null,
                ],
                'adress' => [
                    'type' => 'VARCHAR',
                    'constraint' => '100',
                    'default'=> null,
                ],
                'number' => [
                    'type' => 'VARCHAR',
                    'constraint' => '30',
                    'default'=> null,
                ],
                'email' => [
                    'type' => 'VARCHAR',
                    'constraint' => '50',
                    'default'=> null,
                ],
                'description' => [
                    'type' => 'VARCHAR',
                    'constraint' => '255',
                    'default' => null,
                ],

            ]);
        $this->forge->addKey('id', true, true);
        $this->forge->createTable('place');
    }

    public function down()
    {
        $this->forge->dropTable('place');
    }
}
