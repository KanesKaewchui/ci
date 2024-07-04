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

    public function insert()
    {
        $sql = 'DELETE FROM event_detail WHERE event_id = 1';
        $query = $this->mydev_model->execute($sql);

        $insertedData = [];

        if ($query) {
            $url = 'https://takeme.la/manual_info/list_rank_training/';
            $rs = $this->curl->get($url)->result();
            $response = json_decode($rs);


            $sql = 'SELECT * FROM event_master WHERE event_start <= NOW() AND event_end > NOW()';
            $query = $this->mydev_model->select($sql);
            if (count($query) > 0) {
                foreach ($response->more_data as $key => $value) {
                    $sql = "INSERT INTO event_detail (event_id,user_id,user_name,user_logo,count_gift,updatetime) 
                    VALUES (1, '$value->user_id','$value->user_name','$value->user_logo','$value->count_gift',NOW())";
                    $this->mydev_model->execute($sql);

                    $insertedData[] = [
                        'user_id' => $value->user_id,
                        'user_name' => $value->user_name,
                        'user_logo' => $value->user_logo,
                        'count_gift' => $value->count_gift,
                    ];
                }
            }
        }
        return $insertedData;
    }

    public function getapi()
    {
        $data = $this->insert();
        $group = [
            'th_lang' => 'รหัสร้อน 69',
            'en_lang' => 'HOT69',
            'start_date' => '2024-07-03 14:00:00',
            'end_date' => '2024-07-04 23:59:00',
            'event_id' => '1'
        ];

        $response = [
            'code' => '101',
            'msg' => 'success',
            'more_data' => $data,
            'group' => $group
        ];
        return $this->response->setJSON($response);
    }
}
