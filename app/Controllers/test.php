<?php

namespace App\Controllers;

use App\Models\Mydev_model;
use mysqli;

class Test extends BaseController
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

            $md5Password = md5($password);

            $userid = rand(10000, 99999);

            $conn = new mysqli('localhost', 'root', '', 'db_user');

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "INSERT INTO register (username, password, userid, create_time) VALUES (?, ?, ?, NOW())";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sss", $username, $md5Password, $userid);

            if ($stmt->execute()) {
                echo "Registration successful!<br>";
                echo "Username: " . htmlspecialchars($username) . "<br>";
                echo "Password: " . htmlspecialchars($md5Password) . "<br>"; // Show MD5 password
                echo "User ID: " . htmlspecialchars($userid) . "<br>";
                echo "Created Time: now";
            } else {
                echo "Error: " . $stmt->error;
            }

            $stmt->close();
            $conn->close();
        } else {
            return redirect()->to('test');
        }
    }

    public function login()
    {
        if ($this->session->get('userid')) {
            $userid = $this->session->get('userid');

            $conn = new mysqli('localhost', 'root', '', 'db_user');

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT cash FROM user_detail WHERE userid = ?";
            $stmt = $conn->prepare($sql);

            $stmt->bind_param("i", $userid);

            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $user_detail = $result->fetch_assoc();
                echo "You are already logged in.<br>";
                echo "ID: " . htmlspecialchars($userid) . "<br>";
                echo "Cash: " . htmlspecialchars($user_detail['cash']) . "<br>";

                // Fetch gamename and rate_cal if available
                if ($this->session->get('gamename')) {
                    $gamename = $this->session->get('gamename');

                    $sql = "SELECT gamename, rate_cal FROM gameinfo WHERE gamename = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("s", $gamename);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result->num_rows > 0) {
                        $gameinfo = $result->fetch_assoc();
                        echo "Game: " . htmlspecialchars($gameinfo['gamename']) . "<br>";
                        echo "Rate: " . htmlspecialchars($gameinfo['rate_cal']) . "<br>";
                    }
                }
            } else {
                echo "No cash information found.<br>";
            }

            $stmt->close();
            $conn->close();

            return;
        }

        if ($this->request->getMethod() == 'post') {
            $username = $this->request->getPost('username');
            $password = md5($this->request->getPost('password'));

            $conn = new mysqli('localhost', 'root', '', 'db_user');

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM register WHERE username = ? AND password = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $username, $password);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $user = $result->fetch_assoc();

                $this->session->set('userid', $user['userid']);
                $this->session->set('username', $user['username']);


                echo "Login successful! Welcome, " . htmlspecialchars($user['username']) . "!";
            } else {
                echo "Invalid username or password.";
            }

            $stmt->close();
            $conn->close();
        } else {
            return redirect()->to('test');
        }
    }

    function logout()
    {
        $this->session->destroy();
        return redirect()->to('test');
    }
}
