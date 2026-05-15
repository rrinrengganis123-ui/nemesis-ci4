<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BogorSeeder extends Seeder
{
    public function run()
    {
        // =====================
        // DATA REGENCY
        // =====================
        $this->db->table('regencies')->insert([
            'province_key' => 'province-jawa-barat',
            'code'         => '3271',
            'regency_name' => 'Kota Bogor',
            'display_name' => 'Kota Bogor',
        ]);

        // =====================
        // DATA KECAMATAN
        // =====================
        $districts = [
            ['3271010', 'Bogor Selatan',  'Bogor Selatan'],
            ['3271020', 'Bogor Timur',    'Bogor Timur'],
            ['3271030', 'Bogor Utara',    'Bogor Utara'],
            ['3271040', 'Bogor Tengah',   'Bogor Tengah'],
            ['3271050', 'Bogor Barat',    'Bogor Barat'],
            ['3271060', 'Tanah Sareal',   'Tanah Sareal'],
        ];

        foreach ($districts as $d) {
            $this->db->table('districts')->insert([
                'regency_code'  => '3271',
                'code'          => $d[0],
                'district_name' => $d[1],
                'display_name'  => $d[2],
            ]);
        }

        // =====================
        // DATA KELURAHAN
        // =====================
        $villages = [
            // Bogor Selatan
            ['3271010001', '3271010', 'Muarasari'],
            ['3271010002', '3271010', 'Pamoyanan'],
            ['3271010003', '3271010', 'Ranggamekar'],
            ['3271010004', '3271010', 'Harjasari'],
            ['3271010005', '3271010', 'Cipaku'],
            // Bogor Timur
            ['3271020001', '3271020', 'Baranangsiang'],
            ['3271020002', '3271020', 'Katulampa'],
            ['3271020003', '3271020', 'Sindangrasa'],
            ['3271020004', '3271020', 'Sindangsari'],
            // Bogor Utara
            ['3271030001', '3271030', 'Tanah Baru'],
            ['3271030002', '3271030', 'Cibuluh'],
            ['3271030003', '3271030', 'Ciluar'],
            ['3271030004', '3271030', 'Bantarjati'],
            // Bogor Tengah
            ['3271040001', '3271040', 'Cibogor'],
            ['3271040002', '3271040', 'Ciwaringin'],
            ['3271040003', '3271040', 'Paledang'],
            ['3271040004', '3271040', 'Pabaton'],
            // Bogor Barat
            ['3271050001', '3271050', 'Menteng'],
            ['3271050002', '3271050', 'Pasirjaya'],
            ['3271050003', '3271050', 'Curug'],
            ['3271050004', '3271050', 'Semplak'],
            // Tanah Sareal
            ['3271060001', '3271060', 'Tanah Sareal'],
            ['3271060002', '3271060', 'Kedungwaringin'],
            ['3271060003', '3271060', 'Kayumanis'],
            ['3271060004', '3271060', 'Cibadak'],
        ];

        foreach ($villages as $v) {
            $this->db->table('villages')->insert([
                'code'          => $v[0],
                'district_code' => $v[1],
                'village_name'  => $v[2],
                'display_name'  => $v[2],
            ]);
        }

        // =====================
        // DATA ANGGARAN PRIORITAS
        // =====================
        $anggaran = [
            ['Pembangunan Jalan dan Jembatan',     'Infrastruktur',  85000000000,  67000000000,  'berjalan'],
            ['Peningkatan Layanan Kesehatan',       'Kesehatan',      120000000000, 98000000000,  'berjalan'],
            ['Beasiswa Pendidikan Warga Bogor',     'Pendidikan',     45000000000,  45000000000,  'selesai'],
            ['Pembangunan Taman Kota',              'Lingkungan',     30000000000,  12000000000,  'berjalan'],
            ['Digitalisasi Layanan Publik',         'Teknologi',      25000000000,  8000000000,   'perencanaan'],
            ['Pelatihan UMKM Kota Bogor',           'Ekonomi',        18000000000,  18000000000,  'selesai'],
            ['Pembangunan Drainase Kota',           'Infrastruktur',  60000000000,  42000000000,  'berjalan'],
            ['Program Rumah Tidak Layak Huni',      'Sosial',         35000000000,  20000000000,  'berjalan'],
            ['Pengadaan Armada Sampah',             'Lingkungan',     22000000000,  22000000000,  'selesai'],
            ['Pembangunan Puskesmas Baru',          'Kesehatan',      55000000000,  0,            'perencanaan'],
            ['Revitalisasi Pasar Tradisional',      'Ekonomi',        40000000000,  15000000000,  'berjalan'],
            ['Program Betonisasi Jalan Lingkungan', 'Infrastruktur',  28000000000,  28000000000,  'selesai'],
        ];

        foreach ($anggaran as $a) {
            $this->db->table('anggaran_prioritas')->insert([
                'nama_program'  => $a[0],
                'bidang'        => $a[1],
                'pagu_anggaran' => $a[2],
                'realisasi'     => $a[3],
                'status'        => $a[4],
                'tahun'         => 2026,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ]);
        }

        echo "Data Kota Bogor berhasil dimasukkan!\n";
        echo "- 1 Kota/Kabupaten\n";
        echo "- 6 Kecamatan\n";
        echo "- 25 Kelurahan\n";
        echo "- 12 Program Anggaran Prioritas\n";
    }
}
