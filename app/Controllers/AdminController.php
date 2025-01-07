<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class AdminController extends Controller
{
    public function index()
    {
        // Pastikan hanya admin yang dapat mengakses
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/login');
        }

        return view('admin/dashboard');
    }
}
