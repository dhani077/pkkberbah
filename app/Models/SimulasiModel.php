<?php

namespace App\Models;

use CodeIgniter\Model;

class SimulasiModel extends Model
{
    protected $table = 'simulasipenyuluhan';
    protected $useTimestamps = true;
    protected $allowedFields = ['kd_wilayah', 'nama_kegiatan', 'jns_simulasi', 'tanggal', 'jml_klp', 'jml_sosialisasi', 'jml_kader_L', 'jml_kader_P'];

    public function getWilayah($num = false)
    {
        if ($num == false) {
            return $this->db->table('wilayah')
                ->get()->getResultArray();
        }
        return $this->db->table('wilayah')
            ->where(['kd_wilayah' => $num])->get()->getRowArray();
    }
    public function getData($num = false)
    {
        if ($num == false) {
            $query = $this->db->query("SELECT DISTINCT kejarpaket.kd_wilayah, wilayah.kelurahan FROM kejarpaket JOIN wilayah ON kejarpaket.kd_wilayah = wilayah.kd_wilayah");
            return $query->getResultArray();
        }
        return $this->where(['no' => $num])->first();
    }
    public function getSimulasi($num = false)
    {
        if ($num == false) {
            return $this->db->table('simulasipenyuluhan')
                ->join('wilayah', 'simulasipenyuluhan.kd_wilayah=wilayah.kd_wilayah')
                ->get()->getResultArray();
        }
        return $this->where(['kd_wilayah' => $num])->findAll();
    }

    public function cariSimulasi($keywords)
    {
        return $this->table('simulasipenyuluhan')->like('nama_kegiatan', $keywords)->orLike('jns_simulasi', $keywords)->findAll();
    }

    public function getTanggal($kdwilayah)
    {
        $query = $this->db->query("SELECT DISTINCT tanggal FROM simulasipenyuluhan where kd_wilayah = $kdwilayah Order by tanggal");
        return $query->getResultArray();
    }

    public function getRange($kdwilayah, $awal, $akhir)
    {
        $range = $this->db->query("SELECT * FROM simulasipenyuluhan
        WHERE kd_wilayah='$kdwilayah' AND tanggal BETWEEN '$awal' AND '$akhir' ORDER BY no DESC");
        return $range->getResultArray();
    }
}
