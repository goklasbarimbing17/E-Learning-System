<?php

namespace App\Controllers;

use App\Models\TingkatanModel;

class Tingkatan extends BaseController
{
    protected $TingkatanModel;
    public function __construct()
    {
        $this->TingkatanModel = new TingkatanModel();
        helper('form');
    }
    public function index()
    {
        $data = [
            'title' =>  'Data Tingkatan',
            'subtitle' => 'Tingkatan',
            'tingkatan' => $this->TingkatanModel->getAllData(),
        ];

        return view('admin/tingkatan', $data);
    }

    // public function detail($id)
    // {
    //     $data = [
    //         'title' =>  'User Detail',
    //         'subtitle' => 'Admin',
    //         'user' => $this->UsersModel->getListUserDetail($id),
    //     ];

    //     if (empty($data['user'])) {
    //         return redirect()->to('/admin');
    //     }
    //     return view('admin/detail', $data);
    // }


    public function insertData()
    {
        $tingkatan = $this->request->getPost('tingkatan');

        $data = [
            'tingkatan' => $tingkatan,
        ];
        $this->TingkatanModel->insertData($data);
        session()->setFlashdata('tambah', ' Data berhasil ditambahkan !!!');
        return redirect()->to('/admin/tingkatan');
    }

    public function editData($id)
    {
        $tingkatan = $this->request->getPost('tingkatan');

        $data = [
            'id' => $id,
            'tingkatan' => $tingkatan,
        ];
        $this->TingkatanModel->editData($data);
        session()->setFlashdata('edit', ' Data berhasil dit edit !!!');
        return redirect()->to('/admin/tingkatan');
    }

    public function deleteData($id)
    {
        $data = [
            'id' => $id,
        ];
        $this->TingkatanModel->deleteData($data);
        session()->setFlashdata('delete', ' Data berhasil di delete !!!');
        return redirect()->to('/admin/tingkatan');
    }
}
