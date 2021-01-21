<?php

namespace App\Models;

use CodeIgniter\Model;

class DaftartimpkkModel extends Model
{
    protected $table = 'daftartimpkk';
    protected $useTimestamps = true;
    protected $allowedFields = ['kd_wilayah', 'tgl_masuk', 'nama', 'jabatan', 'jk', 'tempat_lahir', 'tgl_lahir', 'status', 'alamat', 'pendidikan', 'pekerjaan', 'foto', 'keterangan'];

    public function getDaftartimpkk($kdWilayah = false)
    {
        if ($kdWilayah == false) {
            return $this->findAll();
        }

        return $this->where(['kd_wilayah' => $kdWilayah])->get()->getResultArray();
    }

    public function getWilayah($kdWilayah = false)
    {
        if ($kdWilayah == null) {
            return $this->db->table('wilayah')
                ->get()->getResultArray();
        }
        return $this->db->table('wilayah')->where(['kd_wilayah' => $kdWilayah])->get()->getRowArray();
    }

    public function getUbah($no)
    {
        return $this->where(['no' => $no])->first();
    }

    public function cariDaftartimpkk($keywords)
    {
        return $this->table('daftartimpkk')->like('nama', $keywords)->orLike('jabatan', $keywords)->findAll();
    }

    public function getTanggal($kd_wilayah)
    {
        $query = $this->db->query("SELECT DISTINCT tgl_masuk FROM daftartimpkk where kd_wilayah = $kd_wilayah Order by tgl_masuk");
        return $query->getResultArray();
    }

    public function getRange($kdwilayah, $awal, $akhir)
    {
        $range = $this->db->query("SELECT * FROM daftartimpkk
        WHERE kd_wilayah='$kdwilayah' AND tgl_masuk BETWEEN '$awal' AND '$akhir' ORDER BY no DESC");
        return $range->getResultArray();
    }
}
