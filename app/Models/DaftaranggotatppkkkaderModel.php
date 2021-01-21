<?php

namespace App\Models;

use CodeIgniter\Model;

class DaftaranggotatppkkkaderModel extends Model
{
    protected $table = 'daftaranggotakadertppkk';
    protected $useTimestamps = true;
    protected $allowedFields = ['no_reg', 'kd_wilayah', 'tgl_masuk', 'nama', 'jk', 'fungsi_anggota', 'fungsi_kader_umum', 'fungsi_kader_khusus', 'tgl_lahir', 'status', 'alamat', 'pendidikan', 'pekerjaan', 'foto', 'keterangan'];

    public function getWilayah($kdwilayah = false)
    {
        if ($kdwilayah == false) {
            return $this->db->table('wilayah')
                ->get()->getResultArray();
        }
        return $this->db->table('wilayah')->where(['kd_wilayah' => $kdwilayah])->get()->getRowArray();
    }
    public function getData($num = false)
    {
        if ($num == false) {
            $query = $this->db->query("SELECT DISTINCT daftaranggotakadertppkk.kd_wilayah, wilayah.kelurahan FROM daftaranggotakadertppkk JOIN wilayah ON daftaranggotakadertppkk.kd_wilayah = wilayah.kd_wilayah");
            return $query->getResultArray();
        }
        return $this->where(['no_reg' => $num])->first();
    }
    public function getDaftaranggota($num = false)
    {
        if ($num == false) {
            return $this->db->table('daftaranggotakadertppkk')
                ->join('wilayah', 'daftaranggotakadertppkk.kd_wilayah=wilayah.kd_wilayah')
                ->get()->getResultArray();
        }
        return $this->where(['kd_wilayah' => $num])->findAll();
    }

    public function getEditdaftar($num = false)
    {
        if ($num == false) {
            return $this->db->table('daftaranggotakadertppkk')
                ->join('wilayah', 'daftaranggotakadertppkk.kd_wilayah=wilayah.kd_wilayah')
                ->get()->getResultArray();
        }
        return $this->where(['no_reg' => $num])->first();
    }

    public function cariDaftaranggota($keywords)
    {
        return $this->table('daftaranggotakadertppkk')->like('nama', $keywords)->findAll();
    }

    public function getTanggal($kd_wilayah)
    {
        $query = $this->db->query("SELECT DISTINCT tgl_masuk FROM daftaranggotakadertppkk where kd_wilayah = $kd_wilayah Order by tgl_masuk");
        return $query->getResultArray();
    }

    public function getRange($kdwilayah, $awal, $akhir)
    {
        $range = $this->db->query("SELECT * FROM daftaranggotakadertppkk
        WHERE kd_wilayah='$kdwilayah' AND tgl_masuk BETWEEN '$awal' AND '$akhir' ORDER BY no_reg DESC");
        return $range->getResultArray();
    }
}
