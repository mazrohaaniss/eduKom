<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama_lengkap', 'username', 'password', 'role', 'created_at', 'updated_at'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Fungsi untuk mengecek apakah username sudah ada di database
    public function checkUsernameExists($username)
    {
        return $this->where('username', $username)->first();
    }

    // Fungsi untuk menambah pengguna baru
    public function registerUser($data)
    {
        return $this->insert($data);
    }

    // Fungsi untuk login
    public function login($username, $password)
    {
        return $this->where('username', $username)->where('password', $password)->first();
    }
}