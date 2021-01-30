<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
    protected $table = 'admin';
    protected $primaryKey = 'id_admin';

    public function cekUsername($username)
    {
        return $this->db->table('admin')->where(array('username' => $username))->get()->getRowArray();
    }
    public function cekLogin($username, $password)
    {
        return $this->db->table('admin')->where(array('username' => $username, 'password' => $password))->get()->getRowArray();
    }

    public function getAdmin($id)
    {
        return $this->where(['id_admin' => $id])->first();
    }
}
