<?php

namespace App\Controllers;

use App\Models\Mydev_model;
use App\Libraries\aescrypt;
use App\Libraries\curl;
use CodeIgniter\Controller;
use App\Libraries\Jwt;

class ApiDataController extends Controller
{

    public function __construct()
    {
        $this->aes = new aescrypt();
        $this->curl = new curl();
        $this->config = new \Config\App();
        $this->session = \Config\Services::session();
        $this->session->start();
        $this->mydev_model = new Mydev_model();
        $this->Jwt = new Jwt;
    }

    public function index()
    {
        $url = 'http://localhost:8080/ApiDataController/getapi';

        $codehot = $this->curl->get($url);
        $data["users"] = json_decode($codehot->body, true);


        return view('indexcallplay', $data);
    }

    public function insert()
    {
        $sql = 'DELETE FROM event_detail WHERE event_id = 1';
        $query = $this->mydev_model->execute($sql);

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
                }
            }
        }
    }

    public function generateToken($user_id, $event_id)
    {
        $issued_at = time();
        $expiration_time = $issued_at + 3600;
        $payload = [
            'user_id' => $user_id,
            'event_id' => $
        ]
    }

    public function getapi()
    {
        if (!isset($_GET['token'])) {
            echo "missing token";
            exit;
        }

        $token = $_GET['token'];



        // $token_test = 'test123';
        $event_id_test = 1;
        $gen_date_token_test = '2024-07-05 14:00:00';



        // if (!isset($_GET['gen_date_token_test'])) {
        //     echo "missing date";
        //     exit;
        // }

        // if (!isset($_GET['event_id_test'])) {
        //     echo "missing id";
        //     exit;
        // }


        $gen_date_token = $_GET['gen_date_token_test'];
        $event_id = $_GET['event_id_test'];

        $chk_token = md5("|" . $event_id . "|" . $gen_date_token . "|" . "Hello world");

        // $data = md5("|" . $event_id_test . "|" . $gen_date_token_test . "|" . "Hello world");



        if ($chk_token !== $token) {
            echo "Invalid Token";
        }


        $sql = 'SELECT user_id,user_name,user_logo,count_gift FROM event_detail WHERE event_id = 1';
        $query = $this->mydev_model->select($sql);

        $sqlhotcode = 'SELECT lang_id,event_name FROM event_name_master WHERE event_id = 1';
        $queryhotcode = $this->mydev_model->select($sqlhotcode);

        $th_lang = "";
        $en_lang = "";
        if (count($queryhotcode) > 0) {
            for ($i = 0; $i < count($queryhotcode); $i++) {
                if ($queryhotcode[$i]->lang_id == '1') { // lang_id = 1 -> TH,lang_id = 2 -> EN
                    $th_lang = $queryhotcode[$i]->event_name;
                } else if ($queryhotcode[$i]->lang_id == '2') {
                    $en_lang = $queryhotcode[$i]->event_name;
                } else {
                    echo "invalid lang!!";
                    exit;
                }
            }
        }

        $sqldate = 'SELECT event_start,event_end,event_id FROM event_master WHERE event_id = 1';
        $querydate = $this->mydev_model->select($sqldate);

        $event_start = "";
        $event_end = "";
        $event_id = "";
        if (count($querydate) > 0) {
            for ($i = 0; $i < count($querydate); $i++) {
                if ($querydate[$i]->event_start != "") {
                    $event_start = $querydate[$i]->event_start;
                }
                if ($querydate[$i]->event_end != "") {
                    $event_end = $querydate[$i]->event_end;
                }
                if ($querydate[$i]->event_id != "") {
                    $event_id = $querydate[$i]->event_id;
                }
            }
        }

        $group = [
            'th_lang' => $th_lang,
            'en_lang' => $en_lang,
            'start_date' => $event_start,
            'end_date' => $event_end,
            'event_id' => $event_id
        ];

        $response = [
            'code' => '101',
            'msg' => 'success',
            'more_data' => $query,
            'group' => $group
        ];
        return $this->response->setJSON($response);
    }
}
