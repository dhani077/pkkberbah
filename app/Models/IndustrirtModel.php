<?php

namespace App\Models;

use CodeIgniter\Model;

class IndustrirtModel extends Model
{
    protected $table = 'industrirt';
    protected $useTimestamps = true;
    protected $allowedFields = ['tgl_pendataan', 'kategori', 'komoditi', 'volume'];

    public function getIndustrirt($num = false)
    {
        if ($num == false) {
            return $this->findAll();
        }

        return $this->where(['no' => $num])->first();
    }

    public function cariIndustrirt($keywords)
    {
        return $this->table('industrirt')->like('kategori', $keywords)->orLike('komoditi', $keywords)->findAll();
    }

    public function getTanggal()
    {
        $query = $this->db->query("SELECT DISTINCT tgl_pendataan FROM industrirt Order by tgl_pendataan");
        return $query->getResultArray();
    }

    public function getRange($awal, $akhir)
    {
        $range = $this->db->query("SELECT * FROM industrirt
        WHERE tgl_pendataan BETWEEN '$awal' AND '$akhir' ORDER BY tgl_pendataan DESC");
        return $range->getResultArray();
    }
}
