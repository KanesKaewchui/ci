<?php

namespace App\Controllers;

use App\Models\Mydev_model;
use CodeIgniter\Controller;

class test extends Controller
{

    public function __construct()
    {
        $this->config = new \Config\App();
        $this->mydev_model = new Mydev_model();
        $this->session = \Config\Services::session();
        $this->session->start();
    }

    public function index()
    {
        $data = [];
        if ($this->session->get('userid')) {
            $getuserid = $this->session->get('userid');
            $data['userid'] = $getuserid;


            //show cash
            $sql = "SELECT cash FROM user_detail WHERE userid = '$getuserid'";
            $querycash = $this->mydev_model->select($sql);
            $data['cash'] = $querycash[0]->cash;

            //show game
            $sql = "SELECT gamename, cash, rate_cal, (cash * rate_cal) AS total
                    FROM gameinfo 
                    JOIN usergame ON gameinfo.gameid = usergame.gameid
                    GROUP BY gameinfo.gameid";
            $querygame = $this->mydev_model->select($sql);
            foreach ($querygame as $game){
                $game->gamename,
                $game->cash,
                $game->total
            }
            $data['gamename'] = $querygame[0]->gamename;
            $data['cash'] = $querygame[0]->cash;
            $data['total'] = $querygame[0]->total;
        } else {
            echo "0";
        }


        return view('myviews1', $data);
    }

    public function register()
    {
        if ($this->request->getMethod() == 'post') {
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            $md5password  = md5($password);
            $userid = rand(10000, 99999);

            $sql = "INSERT INTO register (username, password, userid, create_time) VALUES ('$username', '$password', '$userid', NOW())";
            $query = $this->mydev_model->execute($sql);


            if ($query) {
                echo "Registration successful<br>";
                echo "Username: " . $username . "<br>";
                echo "Password: " . $md5password . "<br>";
                echo "User ID: " . $userid . "<br>";
                echo "Created Time: now";
            } else {
                echo "Error: " . $this->mydev_model->db_group_name->error();
            }
        } else {
            return view('myviews1');
        }
    }

    public function login()
    {
        $data = [];
        if ($this->request->getMethod() == 'post') {
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            $md5password  = md5($password);


            $sql = "SELECT * FROM register WHERE username = '$username' AND password = '$md5password'";
            $query = $this->mydev_model->select($sql);


            if (isset($query)) {
                echo "Login successful  " . "<br>";
                $this->session->set('userid', $query[0]->userid);


                //show userid
                $data['userid'] = $query[0]->userid;
                $userid = $query[0]->userid;
                echo "UserID : " . $userid . "<br>";


                //show cash
                $sql = "SELECT cash FROM user_detail WHERE userid = '$userid'";
                $querycash = $this->mydev_model->select($sql);
                $data['cash'] = $querycash[0]->cash;
                echo "  Cash : " . $data['cash'] . "<br>";


                //show gamename
                $games = [];
                $sql = "SELECT gamename, cash, rate_cal, (cash * rate_cal) AS total
                        FROM gameinfo 
                        JOIN usergame ON gameinfo.gameid = usergame.gameid
                        GROUP BY gameinfo.gameid";

                $querygame = $this->mydev_model->select($sql);
                foreach ($querygame as $game) {
                    $games[] = [
                        'gamename' => $game->gamename,
                        'cash' => $game->cash,
                        'total' => $game->total
                    ];
                    echo "Game: " . $game->gamename . "<br>"
                        . " Cash: " . $game->cash . "<br>"
                        . " Total: (" . $game->total . ")<br><br>";
                }
                $data['games'] = $games;
            } else {
                echo "Login failed ";
            }
        } else {
        }
        return view('myviews1');
    }

    public function logout()
    {
        $this->session->destroy();
        return redirect()->to('test');
    }
}
