<?php

namespace App\Models;

use CodeIgniter\Model;

class VisiMisiModel extends Model
{
    protected $table = 'visimisi';
    protected $primaryKey = 'id';
    protected $allowedFields = ['visi', 'misi'];

    public function getVisiMisi($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }

    public function getTampil()
    {
        $query = $this->db->query("SELECT * FROM visimisi ORDER BY id DESC LIMIT 1");
        return $query->getRowArray();
    }
}
