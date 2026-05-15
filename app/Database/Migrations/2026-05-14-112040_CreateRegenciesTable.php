<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateRegenciesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'           => ['type' => 'INT', 'auto_increment' => true],
            'province_key' => ['type' => 'VARCHAR', 'constraint' => 100],
            'code'         => ['type' => 'VARCHAR', 'constraint' => 10],
            'regency_name' => ['type' => 'VARCHAR', 'constraint' => 100],
            'display_name' => ['type' => 'VARCHAR', 'constraint' => 100],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('regencies');
    }

    public function down()
    {
        $this->forge->dropTable('regencies');
    }
}
