<?php

namespace App\Controllers;

use App\Models\Mydev_model;
use App\Libraries\aescrypt;
use App\Libraries\curl;

use CodeIgniter\Controller;

class Res extends Controller
{


    public function __construct()
    {
        $this->aes = new aescrypt();
        $this->config = new \Config\App();
        $this->mydev_model = new Mydev_model();
        $this->session = \Config\Services::session();
        $this->session->start();
        $this->curl = new curl();
    }

    public function index()
    {
        $res = $this->curl->get("http://localhost:3000/test");
        $log = json_decode($res->body);
        $data['log'] = $log;
        return view('nodeviews', $data);
    }

    public function postdata()
    {
        $key = '12345GGWP';
        $checksum = md5($key . '67581');
        $body = json_encode(['id' => '67581', 'checksum' => $checksum]);
        $res = $this->curl->post("http://localhost:3000/useridpost", $body, ['Content-Type:application/json']);
        $log = json_decode($res->body);
        $data['log'] = $log;
        return view('nodeviews1', $data);
    }
}
