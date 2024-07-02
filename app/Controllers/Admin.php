<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Admin extends BaseController
{
    protected $session;

    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->session->start();
    }

    public function index()
    {
        if (!$this->isLoggedIn()) {
            return redirect()->to('/admin/login');
        }
        return view('admin/dashboard');
    }

    public function login()
    {
        if ($this->request->getMethod() == 'post') {
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            if ($username === 'admin' && $password === 'admin123') {
                $this->session->set('admin_id', 1);
                return redirect()->to('/admin');
            } else {
                return view('admin/login', ['error' => 'ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง']);
            }
        } else {
            return view('admin/login');
        }
    }

    public function logout()
    {
        $this->session->remove('admin_id');
        return redirect()->to('/admin/login');
    }

    protected function isLoggedIn()
    {
        return $this->session->has('admin_id');
    }
}
