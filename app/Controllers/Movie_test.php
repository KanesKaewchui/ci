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

            $sql = "INSERT INTO user (user_id, user_name, password, name, lastname, email, status, create_time)
                    VALUES ('$user_id', '$user_name', '$password', '$name', '$lastname', '$email', 1, NOW())";
            $query = $this->mydev_model->execute($sql);

            if ($query) {
                echo "Registration successful<br>";
                echo "Username: " . $user_name . "<br>";
                echo "Name-LastName: " . $name . " " . $lastname . "<br>";
                echo "Email: " . $email . "<br>";
                echo "Created Time: " . date('Y-m-d H:i:s');
            } else {
                "Error: " . $this->mydev_model->db_group_name->error();
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
