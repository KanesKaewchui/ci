<?php

namespace App\Controllers;

use App\Models\Mydev_model;
use CodeIgniter\Controller;

class Service extends Controller
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

    public function getuser()
    {
        $userid = $this->request->getGet('userid');
        if ($userid !== null) {
            $sql = 'SELECT * FROM register WHERE userid = ?';
            $data = $this->mydev_model->select_binding($sql, [$userid]);
            if (count($data) <= 0) {
                echo "No data found";
            }
            $jsonbody = json_encode($data);
            echo $jsonbody;
            exit;
        }
        $sql = 'SELECT * FROM register';
        $data = $this->mydev_model->select($sql);
        if (count($data) <= 0) {
            echo "No data found";
        }
        $jsonbody = json_encode($data);
        echo $jsonbody;
    }

    public function postuser()
    {
        $userid = $this->request->post('userid');
        if ($userid !== null) {
            $sql = 'SELECT * FROM register WHERE userid = ?';
            $data = $this->mydev_model->select_binding($sql, [$userid]);
            if (count($data) <= 0) {
                echo "No data found";
            }
            $jsonbody = json_encode($data);
            echo $jsonbody;
            exit;
        }
        $sql = 'SELECT * FROM register';
        $data = $this->mydev_model->select($sql);
        if (count($data) <= 0) {
            echo "No data found";
        }
        $jsonbody = json_encode($data);
        echo $jsonbody;
    }

    public function nodeuser()
    {
        $headers = getallheaders();
        $reqheaders = $headers["test"];
        $userid = $this->request->getVar('id');
        if ($userid !== null && $reqheaders == "test1234") {
            $sql = 'SELECT * FROM register WHERE userid = ?';
            $data = $this->mydev_model->select_binding($sql, [$userid]);
            if (count($data) <= 0) {
                echo "No data found";
            }
            $jsonbody = json_encode($data);
            echo $jsonbody;
            exit;
        }
        echo "error";
    }
}
