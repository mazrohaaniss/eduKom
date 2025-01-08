<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function dashboard()
    {
        // Cek apakah user sudah login dan memiliki role admin
        if (session()->get('role') != 'admin') {
            return redirect()->to('/auth/login');
        }

        return view('admin/dashboard');
    }
}