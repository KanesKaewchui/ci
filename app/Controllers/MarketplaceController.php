<?php

namespace App\Controllers;

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
        return view('Marketplace_views');
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
                echo "Registration successful<br>";
                echo "Username: " . $username . "<br>";
                echo "Email: " . $email . "<br>";
                echo "Password: " . $md5password . "<br>";
                echo "Created Time: now";
            } else {
                echo "Error: " . $this->mydev_model->db_group_name->error();
            }
        } else {
            return view('register_Marketplace_form');
        }
    }

    public function login()
    {
        return view('login_Marketplace_form');
    }
}
