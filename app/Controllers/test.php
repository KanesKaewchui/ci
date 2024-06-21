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
        return view('myviews1');
    }

    public function register()
    {
        if ($this->request->getMethod() == 'post') {
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            $hashedPassword = md5($password);
            $userid = rand(10000, 99999);

            $sql = "INSERT INTO register (username, password, userid, create_time) VALUES (?, ?, ?, NOW())";
            $query = $this->mydev_model->select($sql);

            if ($query) {
                echo "Registration successful<br>";
                echo "Username: " . htmlspecialchars($username) . "<br>";
                echo "Password: " . htmlspecialchars($hashedPassword) . "<br>";
                echo "User ID: " . htmlspecialchars($userid) . "<br>";
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
        if ($this->request->getMethod() == 'post') {
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            $hashedPassword = md5($password);

            $sql = "SELECT * FROM register WHERE username = '$username' AND password = '$hashedPassword'";
            $query = $this->mydev_model->select($sql);



            if (count($query) < 0) {
                echo "Login failed: Invalid username or password";
                exit;
            }

            $sqlcash = "SELECT cash FROM user_detail WHERE userid = ";
            $data = array($query[0]->userid);
            $querycash = $this->mydev_model->select_binding($sqlcash, $data);

            if (count($querycash) < 0) {
                echo "cash failed";
                exit;
            }

            $sqlusergame = "SELECT gameid,cash FROM usergame WHERE userid = ?";
            $queryusergame =  $this->mydev_model->select_binding($sqlusergame, $data);

            if (count($queryusergame) < 0) {
                echo "game failed";
                exit;
            }

            // $sqlgameinfo = "SELECT gamename FROM gameinfo WHERE gameid = ";
            // $queryugameinfo =  $this->mydev_model->select_binding($sqlgameinfo, $data);

            // if (count($queryugameinfo) < 0) {
            //     echo "gameinfo failed";
            //     exit;
            // }
            // print_r($queryugameinfo);







            $this->session->set('userid', $query[0]->userid);
            echo "Login successful";
            echo "  User ID: " . $query[0]->userid;
            echo "  cash: " . $querycash[0]->cash;
            echo "  Game: " . $queryusergame[0]->gameid;
            // echo "  GameName: " . $queryugameinfo[0]->gamename;
        } else {
            return view('myviews1');
        }
    }


    public function logout()
    {
        $this->session->destroy();
        return redirect()->to('test');
    }
}
