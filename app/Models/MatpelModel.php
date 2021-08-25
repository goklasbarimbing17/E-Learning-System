<?php

namespace App\Models;

use CodeIgniter\Model;

class MatpelModel extends Model
{

    public function getAllData()
    {
        return $this->db->table('tb_matpel')
            ->select('id_matpel, matpel, tb_tingkatan.tingkatan, id_pengajar')
            ->join('tb_tingkatan', 'tb_tingkatan.id = tb_matpel.id_matpel')
            ->orderBy('id_matpel', 'ASC')
            ->get()
            ->getResultArray();
    }

    public function insertData($data)
    {
        $this->db->table('tb_matpel')->insert($data);
    }
}
