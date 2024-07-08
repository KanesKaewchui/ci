<?php

namespace App\Controllers\Marketplace;

use App\Models\Mydev_model;
use App\Libraries\aescrypt;
use App\Libraries\curl;
use CodeIgniter\Controller;
use App\Libraries\Jwt;

class MarketplaceController extends Controller
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
        $sql = 'SELECT * FROM items WHERE promotion_price';
        $items = $this->mydev_model->select($sql);

        $data['items'] = $items;

        return view('Marketplace/Marketplace_views', $data);
    }

    public function register()
    {
        if ($this->request->getMethod() == 'post') {
            $username = $this->request->getPost('username');
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            $md5password  = md5($password);

            $sql = "INSERT INTO register (username, email, password, created_at) VALUES ('$username', '$email' ,'$password', NOW())";
            $query = $this->mydev_model->execute($sql);

            if ($query) {
                $response = [
                    'status' => 'success',
                    'message' => 'Registration successful',
                    'Username' => $username,
                    'Email' => $email,
                    'Password' => $md5password,
                    'created_at' => date('Y-m-d H:i:s'),
                ];
            } else {
                $response = [
                    'status' => 'error',
                    'message' => 'Error: ' . $this->mydev_model->db_group_name->error(),

                ];
            }
            header('Content-Type: application/json');
            echo json_encode($response);
        } else {
            return view('Marketplace/register');
        }
    }

    public function login()
    {
        if ($this->request->getMethod() == 'post') {
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            $sql = "SELECT * FROM register WHERE username = ? AND password = ?";
            $query = $this->mydev_model->select_binding($sql, [$username, $password]);

            if (count($query) > 0) {
                $id = $query[0]->id;
                $this->session->set("id", $id);

                $data['data_id'] = $query;
                return view('Marketplace/login', $data);
            } else {
                return view('Marketplace/login');
            }
        }
        return view('Marketplace/login');
    }

    public function promotion()
    {
        $sql = 'SELECT * FROM items WHERE promotion_price > 0';
        $query = $this->mydev_model->select($sql);

        $data['items'] = $query ? $query : [];
        return view('Marketplace_views', $data);
    }

    public function itemdetails($id)
    {
        if (!$id) {
            echo "No item ID provided";
            return;
        }

        $sql = 'SELECT * FROM items WHERE id = ?';
        $query = $this->mydev_model->select_binding($sql, [$id]);

        if (!empty($query)) {
            $item = $query[0];
            $itemarr = json_decode(json_encode($item), true);

            $data['item'] = $itemarr;
            return view('Marketplace/itemdetails', $data);
        } else {
            echo "Item not found";
        }
    }

    public function category()
    {
        return view('Marketplace/category');
    }

    public function trending()
    {
        return view('marketplace/trending');
    }
}
