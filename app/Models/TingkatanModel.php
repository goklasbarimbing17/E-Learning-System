<?php

namespace App\Models;

use CodeIgniter\Model;
use phpDocumentor\Reflection\Types\This;
use Prophecy\Promise\ThrowPromise;

class TingkatanModel extends Model
{
    protected $table = 'tb_tingkatan';

    public function getAllData()
    {
        return $this->db->table('tb_tingkatan')
            ->orderBy('id', 'ASC')
            ->get()
            ->getResultArray();
    }

    public function insertData($data)
    {
        $this->db->table('tb_tingkatan')->insert($data);
    }

    public function editData($data)
    {
        $this->db->table('tb_tingkatan')
            ->where('id', $data['id'])
            ->update($data);
    }

    public function deleteData($data)
    {
        $this->db->table('tb_tingkatan')
            ->where('id', $data['id'])
            ->delete($data);
    }
}
