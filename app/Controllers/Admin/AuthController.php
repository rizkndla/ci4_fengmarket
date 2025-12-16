<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AdminModel;

class AuthController extends BaseController
{
    public function login()
    {
        return view('admin/auth/login');
    }

    public function authenticate()
    {
        $model = new AdminModel();

        $admin = $model->where('username', $this->request->getPost('username'))->first();

        if (!$admin || !password_verify($this->request->getPost('password'), $admin['password'])) {
            return redirect()->back()->with('error', 'Username atau password salah');
        }

        session()->set('admin_logged_in', true);
        session()->set('admin_id', $admin['id']);

        return redirect()->to('/admin/dashboard');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/admin/login');
    }
}