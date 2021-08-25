<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table = 'users';
    protected $useTimestamps = true;

    public function getAllData()
    {
        return $this->db->table('users')
            ->orderBy('id', 'ASC')
            ->get()
            ->getResultArray();
    }
    public function getListUser()
    {
        return $this->db->table('users')
            ->select('users.id as userid, username, email, name')
            ->join('auth_groups_users', 'auth_groups_users.user_id = users.id')
            ->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id')
            ->get()
            ->getResultArray();
    }
    public function getListUserDetail($id)
    {
        return $this->db->table('users')
            ->select('users.id as userid, username, fullname, email, user_image, name')
            ->join('auth_groups_users', 'auth_groups_users.user_id = users.id')
            ->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id')
            ->where(['users.id' => $id])
            ->get()
            ->getRowArray();
    }
    public function insertData($data)
    {
        $this->db->table('users')->insert($data);
    }
}
