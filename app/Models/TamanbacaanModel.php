<?php

namespace App\Models;

use CodeIgniter\Model;

class TamanbacaanModel extends Model
{
    protected $table = 'tamanbacaan';
    protected $useTimestamps = true;
    protected $allowedFields = ['kd_wilayah', 'nama_taman', 'pengelola', 'jml_buku'];

    public function getWilayah($num = false)
    {
        if ($num == false) {
            return $this->db->table('wilayah')
                ->get()->getResultArray();
        }
        return $this->db->table('wilayah')->where(['kd_wilayah' => $num])->get()->getRowArray();
    }

    public function getData($num = false)
    {
        if ($num == false) {
            $query = $this->db->query("SELECT DISTINCT tamanbacaan.kd_wilayah, wilayah.kelurahan FROM tamanbacaan JOIN wilayah ON tamanbacaan.kd_wilayah = wilayah.kd_wilayah");
            return $query->getResultArray();
        }
        return $this->where(['kd_taman' => $num])->first();
    }
    public function getTaman($num = false)
    {
        if ($num == false) {
            return $this->db->table('tamanbacaan')
                ->join('wilayah', 'tamanbacaan.kd_wilayah=wilayah.kd_wilayah')
                ->get()->getResultArray();
        }
        return $this->where(['kd_wilayah' => $num])->findAll();
    }

    public function cariTamanbacaan($keywords)
    {
        return $this->table('tamanbacaan')->like('nama_taman', $keywords)->findAll();
    }
}
