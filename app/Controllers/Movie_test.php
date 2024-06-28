<?php

namespace App\Controllers;

use App\Models\Mydev_model;
use App\Libraries\aescrypt;
use CodeIgniter\Controller;

class Movie_test extends Controller
{

    public function __construct()
    {
        $this->aes = new aescrypt();
        $this->config = new \Config\App();
        $this->mydev_model = new Mydev_model();
        $this->session = \Config\Services::session();
        $this->session->start();
    }

    public function index()
    {
        return view('viewsmovie');
    }

    public function register()
    {
        if ($this->request->getMethod() == 'post') {
            $user_name = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            $name = $this->request->getPost('name');
            $lastname = $this->request->getPost('lastname');
            $email = $this->request->getPost('email');

            $data = [
                'user_name' => $user_name,
                'password' => $password,
                'name' => $name,
                'lastname' => $lastname,
                'email' => $email,
                'status' => 1,
                'create_time' => date('Y-m-d H:i:s')
            ];

            $query = $this->mydev_model->insert($data);

            if ($query) {
                echo "Registration successful<br>";
                echo "Username: " . $user_name . "<br>";
                echo "Password: " . $password . "<br>";
                echo "Name-LastName: " . $name . " " . $lastname . "<br>";
                echo "Email: " . $email . "<br>";
                echo "Created Time: " . $data['create_time'];
            } else {
                echo "Error: " . $this->mydev_model->db_group_name->error();
            }
        } else {
            return view('viewsmovie');
        }
    }

    // public function login()
    // {
    //     if ($this->request->getMethod() == 'post') {
    //         $username = $this->request->getPost('username');
    //         $password = $this->request->getPost('password');

    //         $sql = "SELECT * FROM user WHERE user_name = '$username' AND password  = '$password'";
    //         $query = $this->mydev_model->select($sql);

    //         if (isset($query)) {
    //             echo "Login successful" . "<br>";
    //         }
    //     }
    // }
}
