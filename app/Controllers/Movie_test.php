<?php

namespace App\Controllers;

use App\Models\Movie_model;
use App\Libraries\aescrypt;
use CodeIgniter\Controller;

class Movie_test extends Controller
{

    public function __construct()
    {
        $this->aes = new aescrypt();
        $this->config = new \Config\App();
        $this->movie_model = new Movie_model();
        // $this->session = \Config\Services::session();
        // $this->session->start();
    }

    public function index()
    {
        return view('viewsmovie');
    }

    public function register()
    {

        if ($this->request->getMethod() == 'post') {
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            $user_id = rand(10000, 99999);

            $sql = "INSERT INTO user_movie (user_id,username, password, status, create_time)
                    VALUES ('$user_id','$username', '$password', 1, NOW())";
            $query = $this->movie_model->execute($sql);

            if ($query) {
                echo "Registration successful<br>";
                echo "User ID: " . $user_id . "<br>";
                echo "Username: " . $username . "<br>";
                echo "Password: " . $password . "<br>";
                echo "Created Time: " . date('Y-m-d H:i:s');
            } else {
                "Error: " . $this->movie_model->db_group_name->error();
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

    //         $sql = "SELECT * FROM user WHERE username = '$username' AND password  = '$password'";
    //         $query = $this->mydev_model->select($sql);

    //         if (isset($query)) {
    //             echo "Login successful" . "<br>";
    //         }
    //     }
    // }
}
