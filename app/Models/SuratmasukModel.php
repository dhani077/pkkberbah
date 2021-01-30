<?php

namespace App\Models;

use CodeIgniter\Model;

class SuratmasukModel extends Model
{
    protected $table = 'suratmasuk';
    protected $useTimestamps = true;
    protected $allowedFields = ['tgl_terima', 'tgl_surat', 'no_surat', 'asal_surat', 'perihal', 'lampiran', 'teruskan_kpd'];

    public function getSuratmasuk($num = false)
    {
        if ($num == false) {
            return $this->findAll();
        }

        return $this->where(['no' => $num])->first();
    }

    public function getTanggal()
    {
        $query = $this->db->query("SELECT DISTINCT tgl_terima FROM suratmasuk Order by tgl_terima");
        return $query->getResultArray();
    }

    public function getRange($awal, $akhir)
    {
        $range = $this->db->query("SELECT * FROM suratmasuk
        WHERE tgl_terima BETWEEN '$awal' AND '$akhir' ORDER BY no DESC");
        return $range->getResultArray();
    }
}
