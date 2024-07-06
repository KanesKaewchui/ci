<?php

namespace App\Controllers;

use App\Models\Movie_model;
use App\Libraries\aescrypt;
use App\Libraries\curl;
use CodeIgniter\Controller;

class Takeme extends Controller
{
    protected $curl;
    protected $aes;
    protected $movie_model;
    protected $session;

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
        $response = $this->curl->get($url);

        if (!$response) {
            die('Error: ' . $this->curl->err_msg);
        }

        // $data = json_decode($response, true);

        if (isset($data['more_data'])) {
            $users = $data['more_data'];
        } else {
            $users = [];
        }

        return view('takemeviewsen', ['users' => $users]);
    }
}
