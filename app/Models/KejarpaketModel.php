<?php

namespace App\Models;

use CodeIgniter\Model;

class KejarpaketModel extends Model
{
    protected $table = 'kejarpaket';
    protected $useTimestamps = true;
    protected $allowedFields = ['kd_wilayah', 'tgl_mulai', 'nama_paket', 'jns_paket', 'jml_wrg_bljr_L', 'jml_wrg_bljr_P', 'jml_pengajar_L', 'jml_pengajar_P'];

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
            $query = $this->db->query("SELECT DISTINCT kejarpaket.kd_wilayah, wilayah.kelurahan FROM kejarpaket JOIN wilayah ON kejarpaket.kd_wilayah = wilayah.kd_wilayah");
            return $query->getResultArray();
        }
        return $this->where(['no' => $num])->first();
    }

    public function getKejarpaket($num = false)
    {
        if ($num == false) {
            return $this->db->table('kejarpaket')
                ->join('wilayah', 'kejarpaket.kd_wilayah=wilayah.kd_wilayah')
                ->get()->getResultArray();
        }
        return $this->where(['kd_wilayah' => $num])->findAll();
    }

    public function cariKejarpaket($keywords)
    {
        return $this->table('kejarpaket')->like('nama_paket', $keywords)->orLike('jns_paket', $keywords)->findAll();
    }

    public function getTanggal($kd_wilayah)
    {
        $query = $this->db->query("SELECT DISTINCT tgl_mulai FROM kejarpaket where kd_wilayah = $kd_wilayah Order by tgl_mulai");
        return $query->getResultArray();
    }

    public function getRange($kdwilayah, $awal, $akhir)
    {
        $range = $this->db->query("SELECT * FROM kejarpaket
        WHERE kd_wilayah='$kdwilayah' AND tgl_mulai BETWEEN '$awal' AND '$akhir' ORDER BY no DESC");
        return $range->getResultArray();
    }
}
