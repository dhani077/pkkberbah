<?php

namespace App\Models;

use CodeIgniter\Model;

class SuratkeluarModel extends Model
{
    protected $table = 'suratkeluar';
    protected $useTimestamps = true;
    protected $allowedFields = ['no_surat', 'tgl_surat', 'kepada', 'perihal', 'lampiran', 'tembusan'];

    public function getSuratkeluar($num = false)
    {
        if ($num == false) {
            return $this->findAll();
        }

        return $this->where(['no' => $num])->first();
    }

    public function getTanggal()
    {
        $query = $this->db->query("SELECT DISTINCT tgl_surat FROM suratkeluar Order by tgl_surat");
        return $query->getResultArray();
    }

    public function getRange($awal, $akhir)
    {
        $range = $this->db->query("SELECT * FROM suratkeluar
        WHERE tgl_surat BETWEEN '$awal' AND '$akhir' ORDER BY no DESC");
        return $range->getResultArray();
    }
}
