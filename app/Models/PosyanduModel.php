<?php

namespace App\Models;

use CodeIgniter\Model;

class PosyanduModel extends Model
{
    protected $table = 'posyandu';
    protected $useTimestamps = true;
    protected $allowedFields = ['kd_wilayah', 'nama_posyandu', 'pengelola', 'sekretaris', 'jns_posyandu', 'jml_kader'];

    public function getWilayah($num = false)
    {
        if ($num == false) {
            return $this->db->table('wilayah')->get()->getResultArray();
        }
        return $this->db->table('wilayah')->where(['kd_wilayah' => $num])->get()->getRowArray();
    }

    public function getData($num = false)
    {
        if ($num == false) {
            $query = $this->db->query("SELECT DISTINCT posyandu.kd_wilayah, wilayah.kelurahan FROM kejarpaket JOIN wilayah ON posyandu.kd_wilayah = wilayah.kd_wilayah");
            return $query->getResultArray();
        }
        return $this->where(['kd_posyandu' => $num])->first();
    }
    public function getPosyandu($num = false)
    {
        if ($num == false) {
            return $this->db->table('posyandu')
                ->join('wilayah', 'posyandu.kd_wilayah=wilayah.kd_wilayah')
                ->get()->getResultArray();
        }
        return $this->where(['kd_wilayah' => $num])->findAll();
    }

    public function cariPosyandu($keywords)
    {
        return $this->table('posyandu')->like('nama_posyandu', $keywords)->findAll();
    }
}
