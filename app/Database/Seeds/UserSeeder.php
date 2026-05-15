<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\Shield\Entities\User;
use CodeIgniter\Shield\Models\UserModel;

class UserSeeder extends Seeder
{
    public function run()
    {
        $users = auth()->getProvider();

        // Akun 1 — Super Admin
        $superadmin = new User([
            'username' => 'SuperAdmin',
            'email'    => 'superadmin@bogor.go.id',
            'password' => 'Admin@1234',
        ]);
        $users->save($superadmin);
        $superadmin = $users->findById($users->getInsertID());
        $superadmin->addGroup('superadmin');

        // Akun 2 — Bupati
        $bupati = new User([
            'username' => 'Bupati',
            'email'    => 'bupati@bogor.go.id',
            'password' => 'Bupati@1234',
        ]);
        $users->save($bupati);
        $bupati = $users->findById($users->getInsertID());
        $bupati->addGroup('bupati');

        echo "2 akun berhasil dibuat!\n";
        echo "SuperAdmin → superadmin@bogor.go.id / Admin@1234\n";
        echo "Bupati     → bupati@bogor.go.id / Bupati@1234\n";
    }
}