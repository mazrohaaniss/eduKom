<?php

namespace App\Controllers;

class User extends BaseController
{
    public function dashboard()
    {
        // Cek apakah user sudah login dan memiliki role user
        if (session()->get('role') != 'user') {
            return redirect()->to('/auth/login');
        }

        return view('user/dashboard');
    }
}