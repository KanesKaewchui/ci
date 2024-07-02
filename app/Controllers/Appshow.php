<?php

namespace App\Controllers;

use App\Models\Movie_model;
use App\Libraries\aescrypt;
use App\Libraries\curl;
use CodeIgniter\Controller;

class Appshow extends Controller
{
    protected $curl;

    public function __construct()
    {
        $this->curl = new curl();
        $this->aes = new aescrypt();
        $this->config = new \Config\App();
        $this->movie_model = new Movie_model();
        $this->session = \Config\Services::session();
        $this->session->start();
    }

    public function index()
    {
        $url = 'https://takeme.la/tikky_training/tikky_api';
        $response = $this->curl->get($url)->result();

        if (!$response) {
            die('Error: ' . $this->curl->err_msg);
        }

        $data = json_decode($response, true);

        $users = $data['more_data'];

        return view('appshow_views', ['users' => $users]);
    }
}
