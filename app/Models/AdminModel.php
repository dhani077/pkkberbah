<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table = 'admin';
    protected $primaryKey = 'id_admin';
    protected $allowedFields = ['nama', 'email', 'no_hp', 'username', 'password', 'is_active', 'level'];

    public function getDataadmin($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id_admin' => $id])->first();
    }
}
