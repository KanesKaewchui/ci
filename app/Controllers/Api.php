<?php

namespace App\Controllers;

use App\Models\Movie_model;
use App\Models\Mydev_model;
use App\Libraries\aescrypt;
use App\Libraries\curl;
use CodeIgniter\Controller;

class Api extends Controller
{

    public function __construct()
    {
        $this->aes = new aescrypt();
        $this->curl = new curl();
        $this->config = new \Config\App();
        $this->session = \Config\Services::session();
        $this->session->start();
        $this->mydev_model = new Mydev_model();
    }

    public function index()
    {
        return view('views_api');
    }

    public function insert()
    {
        $url = 'https://takeme.la/manual_info/list_rank_training/';
        $rs = $this->curl->get($url)->result();
        $response = json_decode($rs);
        echo "<pre>";
        // print_r($response->more_data);
        // var_dump($response);




        $sql = 'SELECT * FROM event_master WHERE event_start <= NOW() AND event_end > NOW()';
        $query = $this->mydev_model->select($sql);
        if (count($query) > 0) {
            foreach ($response->more_data as $key => $value) {

                // echo $key . '|';
                // print_r($value);
                // $value->user_id;
                // echo $value->user_id;
                // echo $value->user_name;
                // echo $value->user_logo;
                // echo $value->count_gift;
                echo "<hr>";

                // echo $value->user_id;
                // exit;
                $sql = "INSERT INTO event_detail (event_id,user_id,user_name,user_logo,count_gift,updatetime) 
                VALUES (1, '$value->user_id','$value->user_name','$value->user_logo','$value->count_gift',NOW())";
                $query = $this->mydev_model->execute($sql);

                echo $sql;
            }
        }




        return view('views_api', ['apiData']);
    }
}
