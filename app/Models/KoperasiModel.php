<?php

namespace App\Models;

use CodeIgniter\Model;

class KoperasiModel extends Model
{
    protected $table = 'koperasi';
    protected $useTimestamps = true;
    protected $allowedFields = ['kd_wilayah', 'nama_koperasi', 'jns_koperasi', 'status_hkm_yes', 'status_hkm_non', 'jml_anggota_L', 'jml_anggota_P'];

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
            $query = $this->db->query("SELECT DISTINCT koperasi.kd_wilayah, wilayah.kelurahan FROM koperasi JOIN wilayah ON koperasi.kd_wilayah = wilayah.kd_wilayah");
            return $query->getResultArray();
        }
        return $this->where(['no' => $num])->first();
    }
    public function getKoperasi($num = false)
    {
        if ($num == false) {
            return $this->db->table('koperasi')
                ->join('wilayah', 'wilayah.kd_wilayah=koperasi.kd_wilayah')
                ->get()->getResultArray();
        }
        return $this->where(['kd_wilayah' => $num])->findAll();
    }

    public function cariKoperasi($keywords)
    {
        return $this->table('koperasi')->like('nama_koperasi', $keywords)->findAll();
    }
}
