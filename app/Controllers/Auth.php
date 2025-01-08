<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    // Fungsi untuk menampilkan halaman login
    public function login()
    {
        return view('auth/login');
    }

    // Fungsi untuk menangani proses login
    public function loginAction()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $userModel = new UserModel();

        // Mencari pengguna berdasarkan username dan password
        $user = $userModel->login($username, $password);
        
        if ($user) {
            session()->set([
                'user_id' => $user['id'],
                'username' => $user['username'],
                'role' => $user['role'],
            ]);

            // Redirect berdasarkan role
            if ($user['role'] == 'admin') {
                return redirect()->to('/admin/dashboard');
            } else {
                return redirect()->to('/user/dashboard');
            }
        } else {
            session()->setFlashdata('error', 'Username atau password salah');
            return redirect()->to('/auth/login');
        }
    }

    // Fungsi untuk lupa password
    public function lupapassword()
{
    return view('auth/lupapassword'); // Pastikan view ini mengarah ke file lupapassword.php
}



    // Fungsi untuk menampilkan halaman register
    public function register()
    {
        return view('auth/register');
    }

    // Fungsi untuk menangani proses registrasi
    public function registerAction()
    {
        $nama_lengkap = $this->request->getPost('nama_lengkap');
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $confirm_password = $this->request->getPost('confirm_password');

        // Validasi konfirmasi password
        if ($password !== $confirm_password) {
            session()->setFlashdata('error', 'Password dan konfirmasi password tidak cocok');
            return redirect()->to('/auth/register');
        }

        $userModel = new UserModel();

        // Cek jika username sudah terdaftar
        if ($userModel->checkUsernameExists($username)) {
            session()->setFlashdata('error', 'Username sudah terdaftar');
            return redirect()->to('/auth/register');
        }

        // Daftarkan user baru
        $data = [
            'nama_lengkap' => $nama_lengkap,
            'username' => $username,
            'password' => $password, // Tidak di-hashing sesuai permintaan
            'role' => 'user',
        ];

        $userModel->registerUser($data);
        session()->setFlashdata('success', 'Registrasi berhasil, silakan login');
        return redirect()->to('/auth/login');
    }
}