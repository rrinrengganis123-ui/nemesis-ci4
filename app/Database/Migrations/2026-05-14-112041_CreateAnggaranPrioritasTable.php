<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAnggaranPrioritasTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'           => ['type' => 'INT', 'auto_increment' => true],
            'nama_program' => ['type' => 'VARCHAR', 'constraint' => 255],
            'bidang'       => ['type' => 'VARCHAR', 'constraint' => 100],
            'pagu_anggaran'=> ['type' => 'DECIMAL', 'constraint' => '15,2'],
            'realisasi'    => ['type' => 'DECIMAL', 'constraint' => '15,2', 'default' => 0],
            'tahun'        => ['type' => 'YEAR'],
            'status'       => ['type' => 'ENUM', 'constraint' => ['perencanaan', 'berjalan', 'selesai'], 'default' => 'perencanaan'],
            'created_at'   => ['type' => 'DATETIME', 'null' => true],
            'updated_at'   => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('anggaran_prioritas');
    }

    public function down()
    {
        $this->forge->dropTable('anggaran_prioritas');
    }
}
