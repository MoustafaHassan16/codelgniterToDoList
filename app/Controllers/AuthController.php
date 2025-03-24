<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth/register');
    }

    public function registerUser()
    {
        $userModel = new UserModel();
        $data = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT)
        ];
        $userModel->save($data);
        return redirect()->to('/login');
    }

    public function login()
    {
        return view('auth/login');
    }

    public function loginUser()
    {
        $userModel = new UserModel();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $userModel->where('email', $email)->first();
        if ($user && password_verify($password, $user['password'])) {
            session()->set('user_id', $user['id']);
            return $this->response->setJSON(['status' => 'success', 'redirect' => 'dashboard']);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Invalid credentials']);
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}