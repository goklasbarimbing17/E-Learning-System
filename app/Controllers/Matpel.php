<?php

namespace App\Controllers;

use App\Models\MatpelModel;
use App\Models\TingkatanModel;

class Matpel extends BaseController
{
    protected $TarifModel;
    protected $TingkatanModel;
    public function __construct()
    {
        $this->MatpelModel = new MatpelModel();
        $this->TingkatanModel = new TingkatanModel();
        helper('form');
    }
    public function index()
    {
        $data = [
            'title' =>  'Data Mata pelajaran',
            'subtitle' => 'Mata pelajaran',
            'matpel' => $this->MatpelModel->getAllData(),
            'tingkatan' => $this->TingkatanModel->getAllData(),
        ];

        return view('admin/matpel', $data);
    }

    public function insertData()
    {
        // $tarif = $this->request->getPost('tarif');
        // $tingkatan = $this->request->getPost('tingkatan');
        $data = [
            'matpel' => $this->request->getPost('matpel'),
            'id_tingkatan' => $this->request->getPost('id_tingkatan'),
            'id_pengajar' => $this->request->getPost('pengajar'),
        ];
        $this->MatpelModel->insertData($data);
        session()->setFlashdata('tambah', ' Data berhasil ditambahkan !!!');
        return redirect()->to('/admin/matpel');
    }
}
