<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateVillagesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'            => ['type' => 'INT', 'auto_increment' => true],
            'district_code' => ['type' => 'VARCHAR', 'constraint' => 10],
            'code'          => ['type' => 'VARCHAR', 'constraint' => 10],
            'village_name'  => ['type' => 'VARCHAR', 'constraint' => 100],
            'display_name'  => ['type' => 'VARCHAR', 'constraint' => 100],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('villages');
    }

    public function down()
    {
        $this->forge->dropTable('villages');
    }
}
