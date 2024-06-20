<?php
namespace App\Controllers;
use App\Models\Mydev_model;

class Home extends BaseController{

    public function __construct(){
        $this->config = new \Config\App();
        $this->mydev_model = new Mydev_model();
    }

    public function testConfigVal() {
        echo $this->config->token_key;
    }

    public function testConMysql() {
        $sql = "SELECT * FROM user_info WHERE id = 1;";
        $rs = $this->mydev_model->select($sql);
        // $views = $this->myviews->select($sql);
        echo "<pre>";
        print_r($rs);
    }

    public function viewMysql() {
        $sql = "SELECT * FROM user_info ORDER BY create_time DESC ;";
        $es = $this->mydev_model->select($sql);
        // echo "<pre>";
        // print_r($es);
        $datamysql['data_usre'] = $es;
        return view('viewMysql',$datamysql);
    }

    // public function index()
    // {
    //     echo "Hello CI";
    // }

    // public function test($input1,$input2)
    // {
    //     $data['input_data'] = array("test1"=>$input1,"test2"=>$input2);
    //     return view('myviews',$data);
    // }

    public function check() {
        $register['register_data'] = "register";
        return view('myviews',$register);
    }

    public function process_views(){
        $username = $_POST["username"];
        $email = $_POST["email"];
        $number = $_POST["number"];
        $account = $_POST["account"];
        $password = $_POST["password"];
        $confirm = $_POST["confirmpassword"];
        $name = $_POST["name"];
        $lastname = $_POST["lastname"];

        $username_check = preg_match("/^[a-zA-Z0-9]{4,12}$/",$username);
        $email_check = preg_match("/^[a-zA-Z0-9_.±]+@[a-zA-Z0-9-]+.[a-zA-Z0-9-.]+$/",$email);
        $number_check = preg_match("/^[0-9]+$/",$number);
        $account_check = preg_match("/^[0-9]{13}$/",$account);
        echo $password;
        echo "<br>";
        echo $confirm;

        if (!$username_check){
            echo "username is wrong";
            exit;
        }

        if(!$email_check) {
            echo "email is wrong";
            exit;
        }

        if (!$number_check) {
            echo "number is wrong";
            exit;
        }

        if (!$account_check) {
            echo "account is wrong";
            exit;
        }

        if ($password != $confirm) {
            echo "password is wrong";
            exit;
        }

        $register['views_process'] = array(
            "username"=>$username,
            "email"=>$email,
            "number"=>$number,
            "account"=>$account,
            "password"=>$password,
            "confirm"=>$confirm,
            "name"=>$name,
            "lastname"=>$lastname
        );

        return view('views_process',$register);
    }

}
