<?php

namespace App\Models;

use CodeIgniter\Model;

class UangkeluarModel extends Model
{
    protected $table = 'bukuuangkeluar';
    protected $useTimestamps = true;
    protected $allowedFields = ['tanggal', 'sumber_dana', 'uraian', 'no_bukti', 'jml_keluar'];

    public function getUangkeluar($num = false)
    {
        if ($num == false) {
            return $this->findAll();
        }

        return $this->where(['no' => $num])->first();
    }

    public function getTotal($awal = false, $akhir = false)
    {
        if ($awal == false && $akhir == false) {
            $total = $this->db->query("SELECT SUM(jml_keluar) AS total FROM bukuuangkeluar");
            return $total->getResultArray();
        }
        return $this->db->query("SELECT SUM(jml_keluar) AS total FROM bukuuangkeluar WHERE tanggal BETWEEN '$awal' AND '$akhir' ORDER BY no DESC")->getResultArray();
    }

    public function getTanggal()
    {
        $query = $this->db->query("SELECT DISTINCT tanggal FROM bukuuangkeluar Order by tanggal");
        return $query->getResultArray();
    }

    public function getRange($awal, $akhir)
    {
        $range = $this->db->query("SELECT * FROM bukuuangkeluar
        WHERE tanggal BETWEEN '$awal' AND '$akhir' ORDER BY tanggal DESC");
        return $range->getResultArray();
    }
}
