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
            $birthday = $this->request->getPost('birthday');

            $sql = "INSERT INTO user_movie (user_id, username, password, birthday, status, create_time)
                    VALUES ('$user_id', '$username', '$password', '$birthday', 1, NOW())";
            $query = $this->movie_model->execute($sql);

            if ($query) {
                echo "Registration successful<br>";
                echo "User ID: " . $user_id . "<br>";
                echo "Username: " . $username . "<br>";
                echo "Password: " . $password . "<br>";
                echo "Birthday: " . $birthday . "<br>";
                echo "Created Time: " . date('Y-m-d H:i:s');
                echo '<br><br><a href="/Movie_test"><button>HOME</button></a>';
            } else {
                "Error: " . $this->movie_model->db_group_name->error();
            }
        } else {
            return view('viewsmovie');
        }
    }

    public function login()
    {
        if ($this->request->getMethod() == 'post') {
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            $sql = "SELECT * FROM user_movie WHERE username = '$username' AND password = '$password'";
            $query = $this->movie_model->execute($sql);

            if ($query->getNumRows() > 0) {
                echo "Login successful" . "<br>";
                echo "Username: " . $username . "<br>";
                echo "password: " . $password . "<br>";
            }
        } else {
            return view('viewsmovie');
        }
    }

    public function get_movie()
    {
        $sql = "SELECT round_id,movie_name,genre,movie_duration,movie_start_show_time,price 
        FROM movie_detail";
        $query = $this->movie_model->execute($sql);

        if ($query->num_rows() > 0) {
            echo "<h2>Movie List</h2>";
            echo "<ul>";
            foreach ($query->result() as $row) {
                echo "<li>" . $row->movie_name . "</li>";
            }
            echo "</ul>";
        }
    }


    // public function booking()
    // {
    //     if ($this->request->getMethod() == 'post') {
    //         $username = $this->request->getPost('username');
    //         $password = $this->request->getPost('password');

    //         $sql = "SELECT * FROM user_movie WHERE username = '$username' AND password = '$password'";
    //         $query = $this->movie_model->execute($sql);

    //         if ($query->getNumRows() > 0) {
    //             echo "Login successful" . "<br>";
    //             echo "Username: " . $username . "<br>";
    //             echo "password: " . $password . "<br>";
    //         }
    //     } else {
    //         return view('viewsmovie');
    //     }
    // }
}
