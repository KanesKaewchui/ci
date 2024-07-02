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
        $this->session = \Config\Services::session();
        $this->session->start();
    }

    public function index()
    {
        $data['movies'] = $this->get_movie();
        return view('viewsmovie', $data);
    }

    public function get_movie()
    {
        $sql = "SELECT round_id, movie_name, genre, movie_duration, movie_start_show_time, price FROM movie_detail";
        $query = $this->movie_model->select($sql);

        if (count($query) > 0) {
            return $query;
        } else {
            return [];
        }
    }


    public function register_form()
    {
        return view('register_form');
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
                $data = [
                    'user_id' => $user_id,
                    'username' => $username,
                    'password' => $password,
                    'birthday' => $birthday,
                    'created_time' => date('Y-m-d H:i:s')
                ];
                return view('register_process', $data);
            } else {
                "Error: " . $this->movie_model->db_group_name->error();
            }
        } else {
            return view('viewsmovie');
        }
    }

    public function login_form()
    {
        return view('login_form');
    }

    public function login()
    {
        if ($this->request->getMethod() == 'post') {
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');


            $sql = "SELECT * FROM user_movie WHERE username = '$username' AND password = '$password'";
            $query = $this->movie_model->select($sql);
            $user_id = $query[0]->user_id;
            $this->session->set("user_id", $user_id);


            if (count($query) > 0) {

                $data['user_data'] = $query;
                return view('login_process', $data);
            }
        } else {
            return view('viewsmovie');
        }
    }

    public function book_form($round_id)
    {
        if (!$this->session->get('isLoggedIn')) {

            return redirect()->to('/Movie_test/login_form');
        }
        $sql = "SELECT round_id, available_seats FROM movie_round WHERE round_id = ?";
        $query = $this->movie_model->select_binding($sql, [$round_id]);

        if (!empty($query)) {
            $round = $query[0];
            $data['round'] = $round;
            return view('book_form', $data);
        } else {
            echo "This screening does not exist.";
            echo '<br><br><a href="/Movie_test"><button>HOME</button></a>';
        }
    }



    // public function book_ticket()
    // {
    //     if ($this->session->get('isLoggedIn')) {
    //         if ($this->request->getMethod() == 'post') {
    //             $user_id = $this->session->get('user_data')->user_id;
    //             $round_id = $this->request->getPost('round_id');
    //             $booked_seats = $this->request->getPost('seats');

    //             $sql = "SELECT available_seats FROM movie_round WHERE round_id = '$round_id'";
    //             $query = $this->movie_model->execute($sql);
    //             $result = $query->getRow();

    //             if ($result && $result->available_seats >= $booked_seats) {
    //                 $new_available_seats = $result->available_seats - $booked_seats;
    //                 $sql_update = "UPDATE movie_round SET available_seats = '$new_available_seats' WHERE round_id = '$round_id'";
    //                 $this->movie_model->execute($sql_update);

    //                 $sql_insert = "INSERT INTO booking (user_id, round_id, booked_seats) VALUES ('$user_id', '$round_id', '$booked_seats')";
    //                 $this->movie_model->execute($sql_insert);

    //                 echo "Booking successful<br>";
    //                 echo '<br><br><a href="/Movie_test"><button class="mt-2 bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">HOME</button></a>';
    //             } else {
    //                 echo "Not enough available seats<br>";
    //                 echo '<br><br><a href="/Movie_test"><button class="mt-2 bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">HOME</button></a>';
    //             }
    //         }
    //     } else {
    //         return redirect()->to('/Movie_test/login_form');
    //     }
    // }
}
