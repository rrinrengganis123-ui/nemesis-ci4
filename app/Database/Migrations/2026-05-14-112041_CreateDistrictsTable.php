<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateDistrictsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'            => ['type' => 'INT', 'auto_increment' => true],
            'regency_code'  => ['type' => 'VARCHAR', 'constraint' => 10],
            'code'          => ['type' => 'VARCHAR', 'constraint' => 10],
            'district_name' => ['type' => 'VARCHAR', 'constraint' => 100],
            'display_name'  => ['type' => 'VARCHAR', 'constraint' => 100],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('districts');
    }

    public function down()
    {
        $this->forge->dropTable('districts');
    }
}
