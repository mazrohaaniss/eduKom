<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class UserController extends Controller
{
    public function index()
    {
        // Pastikan hanya user yang dapat mengakses
        if (session()->get('role') !== 'user') {
            return redirect()->to('/login');
        }

        return view('user/dashboard');
    }
}
