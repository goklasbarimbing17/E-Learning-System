<?php

namespace App\Models;

use CodeIgniter\Model;

class MateriModel extends Model
{

    public function getAllData()
    {
        return $this->db->table('tb_tarifles')
            ->select('id_tarif, tingkatan, tarif')
            ->join('tb_tingkatan', 'tb_tingkatan.id = tb_tarifles.id_tarif')
            ->orderBy('id_tarif', 'ASC')
            ->get()
            ->getResultArray();
    }

    public function insertData($data)
    {
        $this->db->table('tb_tarifles')->insert($data);
    }
}
