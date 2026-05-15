<?php
namespace App\Controllers;
use CodeIgniter\Controller;

class Home extends Controller
{
    public function index()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT * FROM provinces LIMIT 5");
        $data['provinces'] = $query->getResult();
        return view('welcome_message', $data);
    }
}
