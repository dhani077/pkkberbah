<?php

namespace App\Models;

use CodeIgniter\Model;

class LayananposyanduModel extends Model
{
    protected $table = 'layananposyandu';
    protected $useTimestamps = true;
    protected $allowedFields = ['kd_posyandu', 'jns_kegiatan', 'frekwensi_layanan', 'jml_pengunjung_L', 'jml_pengunjung_P', 'jml_petugas_L', 'jml_petugas_P', 'keterangan'];

    public function getLayanan($num = false)
    {
        if ($num == false) {
            return $this->db->table('posyandu')
                ->join('wilayah', 'posyandu.kd_wilayah=wilayah.kd_wilayah')->join('layananposyandu', 'posyandu.kd_posyandu=layananposyandu.kd_posyandu')
                ->get()->getResultArray();
        }
        return $this->where(['kd_posyandu' => $num])->findAll();
    }

    public function getData($num = false)
    {
        if ($num == false) {
            $this->db->table('layananposyandu')
                ->join('posyandu', 'posyandu.kd_posyandu=layananposyandu.kd_posyandu')
                ->get()->getResultArray();
            return $this->findAll();
        }

        return $this->where(['no' => $num])->first();
    }
}
