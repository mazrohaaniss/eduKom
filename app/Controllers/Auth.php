<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Auth extends Controller
{
    public function register()
    {
        return view('auth/register');
    }

    public function save()
    {
        $validation =  \Config\Services::validation();

        // Validasi input
        $rules = [
            'username' => 'required|is_unique[users.username]',
            'password' => 'required|min_length[6]',
            'role' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $model = new UserModel();
        $data = [
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role'     => $this->request->getPost('role')
        ];

        $model->save($data);
        return redirect()->to('/login');
    }

    public function login()
    {
        return view('auth/login');
    }

    public function loginCheck()
    {
        $validation =  \Config\Services::validation();

        // Validasi input login
        $rules = [
            'username' => 'required',
            'password' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        
        $model = new UserModel();
        $user = $model->getUserByUsername($username);

        if ($user && password_verify($password, $user['password'])) {
            session()->set('user_id', $user['id']);
            session()->set('username', $user['username']);
            session()->set('role', $user['role']);

            if ($user['role'] == 'admin') {
                return redirect()->to('/admin-dashboard');
            } else {
                return redirect()->to('/user-dashboard');
            }
        } else {
            session()->setFlashdata('error', 'Invalid username or password');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
