<?php

namespace App\Models;

use CodeIgniter\Model;

class ManfaattanahModel extends Model
{
    protected $table = 'pemanfaatantanah';
    protected $useTimestamps = true;
    protected $allowedFields = ['tgl_pendataan', 'kategori', 'komoditi', 'jumlah'];

    public function getManfaattanah($num = false)
    {
        if ($num == false) {
            return $this->findAll();
        }

        return $this->where(['no' => $num])->first();
    }

    public function cariManfaattanah($keywords)
    {
        return $this->table('pemanfaatantanah')->like('kategori', $keywords)->orLike('komoditi', $keywords)->findAll();
    }

    public function getTanggal()
    {
        $query = $this->db->query("SELECT DISTINCT tgl_pendataan FROM pemanfaatantanah Order by tgl_pendataan");
        return $query->getResultArray();
    }

    public function getRange($awal, $akhir)
    {
        $range = $this->db->query("SELECT * FROM pemanfaatantanah
        WHERE tgl_pendataan BETWEEN '$awal' AND '$akhir' ORDER BY tgl_pendataan DESC");
        return $range->getResultArray();
    }
}
