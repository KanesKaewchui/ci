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
        $sql = "SELECT md.movie_name, md.genre, md.movie_duration, md.price, mr.round_id, mr.round_time, mr.available_seats 
                FROM movie_detail md
                JOIN movie_round mr ON md.movie_id = mr.movie_id";
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
            $birthday = $this->request->getPost('birthday');

            $sql = "INSERT INTO user_movie (username, password, birthday, status, create_time)
                    VALUES (?, ?, ?, 1, NOW())";
            $params = [$username, $password, $birthday];
            $query = $this->movie_model->execute_binding($sql, $params);

            if ($query) {
                $data = [
                    'username' => $username,
                    'password' => $password,
                    'birthday' => $birthday,
                    'created_time' => date('Y-m-d H:i:s')
                ];
                return view('register_process', $data);
            } else {
                echo "Error: " . $this->movie_model->db_group_name->error();
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

            $sql = "SELECT * FROM user_movie WHERE username = ? AND password = ?";
            $params = [$username, $password];
            $query = $this->movie_model->select_binding($sql, $params);

            if (count($query) > 0) {
                $user_id = $query[0]->user_id;
                $this->session->set("user_id", $user_id);

                $data['user_data'] = $query;
                return view('login_process', $data);
            } else {
                return view('login_form', ['error' => 'Invalid username or password']);
            }
        } else {
            return view('viewsmovie');
        }
    }

    public function book_form($round_id)
    {
        $sql = "SELECT 
            movie_round.round_id, 
            movie_detail.movie_name, 
            movie_detail.genre, 
            movie_detail.movie_duration, 
            movie_round.round_time AS movie_start_show_time, 
            movie_detail.price, 
            movie_round.available_seats 
        FROM 
            movie_round 
        JOIN 
            movie_detail 
        ON 
            movie_round.movie_id = movie_detail.movie_id 
        WHERE 
            movie_round.round_id = ?";

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
    
    
    public function book_ticket()
    {
        if ($this->request->getMethod() == 'post') {
            $user_id = $this->session->get("user_id");
            $round_id = $this->request->getPost('round_id');
            $seats = $this->request->getPost('seats');

            $sql = "INSERT INTO bookings (user_id, round_id, seats, booking_time) VALUES (?, ?, ?, NOW())";
            $params = [$user_id, $round_id, $seats];
            $query = $this->movie_model->execute_binding($sql, $params);

            if ($query) {
                $sql_update = "UPDATE movie_round SET available_seats = available_seats - ? WHERE round_id = ?";
                $params_update = [$seats, $round_id];
                $this->movie_model->execute_binding($sql_update, $params_update);

                return view('booking_success');
            } else {
                return view('booking_failed');
            }
        } else {
            return view('viewsmovie');
        }
    }
}
