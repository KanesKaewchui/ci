<?php

namespace App\Controllers\Marketplace;

use App\Models\Mydev_model;
use App\Libraries\aescrypt;
use App\Libraries\curl;
use CodeIgniter\Controller;
use App\Libraries\Jwt;

class MarketplaceController extends Controller
{

    public function __construct()
    {
        $this->aes = new aescrypt();
        $this->curl = new curl();
        $this->config = new \Config\App();
        $this->session = \Config\Services::session();
        $this->session->start();
        $this->mydev_model = new Mydev_model();
        $this->Jwt = new Jwt;
    }

    public function index()
    {
        return view('Marketplace/Marketplace_views');
    }

    public function register()
    {
        if ($this->request->getMethod() == 'post') {
            $username = $this->request->getPost('username');
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            $md5password  = md5($password);

            $sql = "INSERT INTO register (username, email, password, created_at) VALUES ('$username', '$email' ,'$password', NOW())";
            $query = $this->mydev_model->execute($sql);

            if ($query) {
                $response = [
                    'status' => 'success',
                    'message' => 'Registration successful',
                    'Username' => $username,
                    'Email' => $email,
                    'Password' => $md5password,
                    'created_at' => date('Y-m-d H:i:s'),
                ];
            } else {
                $response = [
                    'status' => 'error',
                    'message' => 'Error: ' . $this->mydev_model->db_group_name->error(),

                ];
            }
            header('Content-Type: application/json');
            echo json_encode($response);
        } else {
            return view('Marketplace/register');
        }
    }

    public function login()
    {
        return view('Marketplace/login');
    }

    public function promotion()
    {
        return view('Marketplace/promotion');
    }

    public function category()
    {
        return view('Marketplace/category');
    }

    public function trending()
    {
        return view('marketplace/trending');
    }

    public function itemdetails($id)
    {
        $sql = 'SELECT * FROM items WHERE id = ?';
        $query = $this->mydev_model->select_binding($sql, [$id]);

        if (!empty($query)) {
            $item = $query[0];
            $data['item'] = $item;
            return view('Marketplace/itemdetails', $data);
        } else {
            show_404();
        }
    }
}
