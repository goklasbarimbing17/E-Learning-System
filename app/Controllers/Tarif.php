<?php

namespace App\Controllers;

use App\Models\TarifModel;
use App\Models\TingkatanModel;

class Tarif extends BaseController
{
    protected $TarifModel;
    protected $TingkatanModel;
    public function __construct()
    {
        $this->TarifModel = new TarifModel();
        $this->TingkatanModel = new TingkatanModel();
        helper('form');
    }
    public function index()
    {
        $data = [
            'title' =>  'Data Tarif Les',
            'subtitle' => 'Tarif Les',
            'tarifles' => $this->TarifModel->getAllData(),
            'tingkatan' => $this->TingkatanModel->getAllData(),
        ];

        return view('admin/tarif', $data);
    }

    public function insertData()
    {
        // $tarif = $this->request->getPost('tarif');
        // $tingkatan = $this->request->getPost('tingkatan');
        $data = [
            'id_tingkatan' => $this->request->getPost('id_tingkatan'),
            'tarif' => $this->request->getPost('tarif'),
        ];
        $this->TarifModel->insertData($data);
        session()->setFlashdata('tambah', ' Data berhasil ditambahkan !!!');
        return redirect()->to('/admin/tarif');
    }
}
