<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TingkatanSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'tingkatan' => 'SD'
        ];

        // Simple Queries
        $this->db->query("INSERT INTO tb_tingkatan (tingkatan) VALUES(:tingkatan:)", $data);

        // // Using Query Builder
        // $this->db->table('users')->insert($data);
    }
}
