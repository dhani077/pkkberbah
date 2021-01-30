<?php

namespace App\Models;

use CodeIgniter\Model;

class JenisbukuModel extends Model
{
    protected $table = 'jenisbuku';
    protected $useTimestamps = true;
    protected $allowedFields = ['kd_taman', 'jns_buku', 'kategori', 'jumlah'];

    public function getBuku($num = false)
    {
        if ($num == false) {
            return $this->db->table('tamanbacaan')
                ->join('wilayah', 'tamanbacaan.kd_wilayah=wilayah.kd_wilayah')->join('jenisbuku', 'tamanbacaan.kd_taman=jenisbuku.kd_taman')
                ->get()->getResultArray();
        }
        return $this->where(['kd_taman' => $num])->findAll();
    }

    public function getData($num = false)
    {
        if ($num == false) {
            $this->db->table('jenisbuku')
                ->join('tamanbacaan', 'tamanbacaan.kd_taman=jenisbuku.kd_taman')
                ->get()->getResultArray();
            return $this->findAll();
        }

        return $this->where(['no_buku' => $num])->first();
    }
}
