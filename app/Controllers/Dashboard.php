<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Dashboard extends Controller
{
    public function superadmin()
{
    if (!auth()->loggedIn() || !auth()->user()->inGroup('superadmin')) {
        return redirect()->to('/login');
    }

    $db = \Config\Database::connect();

    $data['total_provinsi']  = $db->table('provinces')->countAll();
    $data['total_pengguna']  = $db->table('users')->countAll();
    $data['total_kecamatan'] = $db->table('districts')->countAll();
    $data['total_kelurahan'] = $db->table('villages')->countAll();
    $data['total_anggaran']  = $db->table('anggaran_prioritas')->countAll();
    $data['provinces']       = $db->table('provinces')->orderBy('province_name', 'ASC')->get()->getResult();
    $data['districts']       = $db->table('districts')->get()->getResult();
    $data['anggaran']        = $db->table('anggaran_prioritas')->orderBy('pagu_anggaran', 'DESC')->get()->getResult();

    return view('dashboard/superadmin', $data);
}

    public function bupati()
    {
        if (!auth()->loggedIn() || !auth()->user()->inGroup('bupati')) {
            return redirect()->to('/login');
        }

        $db = \Config\Database::connect();

        $data['total_anggaran']   = $db->table('anggaran_prioritas')->countAll();
        $data['total_berjalan']   = $db->table('anggaran_prioritas')->where('status', 'berjalan')->countAllResults();
        $data['total_selesai']    = $db->table('anggaran_prioritas')->where('status', 'selesai')->countAllResults();
        $data['total_pagu']       = $db->table('anggaran_prioritas')->selectSum('pagu_anggaran')->get()->getRow()->pagu_anggaran;
        $data['total_realisasi']  = $db->table('anggaran_prioritas')->selectSum('realisasi')->get()->getRow()->realisasi;
        $data['anggaran_list']    = $db->table('anggaran_prioritas')->orderBy('pagu_anggaran', 'DESC')->get()->getResult();

        $db = \Config\Database::connect();

$provinces = $db->query("SELECT * FROM provinces LIMIT 10")->getResult();

$districts = [
    (object)[
        'code' => '3271010',
        'district_name' => 'Bogor Selatan'
    ],
    (object)[
        'code' => '3271020',
        'district_name' => 'Bogor Timur'
    ],
    (object)[
        'code' => '3271030',
        'district_name' => 'Bogor Utara'
    ]
];

$anggaran = [
    (object)[
        'nama_program' => 'Perbaikan Jalan',
        'bidang' => 'Infrastruktur',
        'pagu_anggaran' => 250000000,
        'realisasi' => 180000000,
        'status' => 'berjalan'
    ],
    (object)[
        'nama_program' => 'Drainase Kota',
        'bidang' => 'PU',
        'pagu_anggaran' => 175000000,
        'realisasi' => 175000000,
        'status' => 'selesai'
    ]
];

        return view('dashboard/bupati', $data);
    }

    public function index()
    {
        if (!auth()->loggedIn()) {
            return redirect()->to('/login');
        }
        $user = auth()->user();
        if ($user->inGroup('superadmin')) {
            return redirect()->to('/dashboard/superadmin');
        }
        if ($user->inGroup('bupati')) {
            return redirect()->to('/dashboard/bupati');
        }
        return redirect()->to('/login');
    }
}