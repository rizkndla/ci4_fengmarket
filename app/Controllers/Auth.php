<?php

namespace App\Controllers;

use App\Models\AdminModel;

class Auth extends BaseController
{
    public function login()
    {
        return view('auth/login');
    }

    public function attemptLogin()
    {
        $model = new AdminModel();

        $admin = $model->where('username', $this->request->getPost('username'))->first();

        if (!$admin) {
            return redirect()->back()->with('error', 'Username tidak ditemukan');
        }

        if (!password_verify($this->request->getPost('password'), $admin['password'])) {
            return redirect()->back()->with('error', 'Password salah');
        }

        session()->set([
            'admin_id' => $admin['id'],
            'is_admin' => true,
        ]);

        return redirect()->to('/admin/dashboard');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}