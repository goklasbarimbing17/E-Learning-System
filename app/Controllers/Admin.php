<?php

namespace App\Controllers;

use App\Models\UsersModel;

class Admin extends BaseController
{
    protected $UsersModel;
    public function __construct()
    {
        $this->UsersModel = new UsersModel();
        helper('form');
    }
    public function index()
    {
        $data = [
            'title' =>  'User List',
            'subtitle' => 'Admin',
            'admin' => $this->UsersModel->getListUser(),
        ];

        return view('admin/index', $data);
    }

    public function detail($id)
    {
        $data = [
            'title' =>  'User Detail',
            'subtitle' => 'Admin',
            'user' => $this->UsersModel->getListUserDetail($id),
        ];

        if (empty($data['user'])) {
            return redirect()->to('/admin');
        }
        return view('admin/detail', $data);
    }


    public function insertData()
    {
        $email = $this->request->getPost('email');
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $data = [
            'email' => $email,
            'username' => $username,
            'password_hash' => password_hash($password, PASSWORD_BCRYPT),
        ];
        $this->UsersModel->insertData($data);
        // session()->setFlashdata('pesan', '')
        return redirect()->to('/admin');
    }
}
