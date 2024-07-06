<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Database\Query;

class Admin extends BaseController
{
    protected $session;
    protected $db;

    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->session->start();
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        if (!$this->isLoggedIn()) {
            return redirect()->to('/admin/login');
        }
        return view('admin/dashboard');
    }

    public function movies()
    {
        if (!$this->isLoggedIn()) {
            return redirect()->to('/admin/login');
        }

        $query = $this->db->query("SELECT * FROM movie_detail");
        $data['movies'] = $query->getResult();

        return view('admin/movies', $data);
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

    public function edit_movie($movie_id)
    {
        if (!$this->isLoggedIn()) {
            return redirect()->to('/admin/login');
        }

        $query = $this->db->query("SELECT * FROM movie_detail WHERE movie_id = ?", [$movie_id]);
        $movie = $query->getRow();

        if ($this->request->getMethod() == 'post') {
            $data = [
                'movie_name' => $this->request->getPost('movie_name'),
                'genre' => $this->request->getPost('genre'),
                'movie_duration' => $this->request->getPost('movie_duration'),
                'price' => $this->request->getPost('price'),
            ];

            $this->db->table('movie_detail')->update($data, ['movie_id' => $movie_id]);
            return redirect()->to('/admin/movies');
        }

        return view('admin/edit_movie', ['movie' => $movie]);
    }

    public function delete_movie($movie_id)
    {
        if (!$this->isLoggedIn()) {
            return redirect()->to('/admin/login');
        }

        $this->db->table('movie_detail')->delete(['movie_id' => $movie_id]);
        return redirect()->to('/admin/movies');
    }

    public function add_movie()
    {
        if (!$this->isLoggedIn()) {
            return redirect()->to('/admin/login');
        }

        if ($this->request->getMethod() == 'post') {
            $data = [
                'movie_name' => $this->request->getPost('movie_name'),
                'genre' => $this->request->getPost('genre'),
                'movie_duration' => $this->request->getPost('movie_duration'),
                'price' => $this->request->getPost('price'),
            ];

            $this->db->table('movie_detail')->insert($data);
            return redirect()->to('/admin/movies');
        }

        return view('admin/add_movie');
    }
}
