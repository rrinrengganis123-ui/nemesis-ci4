<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Auth extends Controller
{
    public function login()
    {
        if (auth()->loggedIn()) {
            return redirect()->to('/dashboard');
        }
        return view('auth/login');
    }

    public function loginAction()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Map username ke email
        $map = [
            'SuperAdmin' => 'superadmin@bogor.go.id',
            'Bupati'     => 'bupati@bogor.go.id',
        ];

        $email = $map[$username] ?? null;

        if (!$email) {
            return redirect()->back()->with('error', 'Username atau password salah!');
        }

        $credentials = [
            'email'    => $email,
            'password' => $password,
        ];

        $result = auth()->attempt($credentials);

        if (!$result->isOK()) {
            return redirect()->back()->with('error', 'Username atau password salah!');
        }

        $user = auth()->user();

        if ($user->inGroup('superadmin')) {
            return redirect()->to('/dashboard/superadmin');
        }

        if ($user->inGroup('bupati')) {
            return redirect()->to('/dashboard/bupati');
        }

        return redirect()->to('/dashboard');
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->to('/login');
    }
}