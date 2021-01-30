<?php

namespace App\Models;

use CodeIgniter\Model;

class UangmasukModel extends Model
{
    protected $table = 'bukuuangmasuk';
    protected $useTimestamps = true;
    protected $allowedFields = ['tanggal', 'sumber_dana', 'uraian', 'no_bukti', 'jml_terima'];

    public function getUangmasuk($num = false)
    {
        if ($num == false) {
            return $this->findAll();
        }

        return $this->where(['no' => $num])->first();
    }
    public function getTotal($awal = false, $akhir = false)
    {
        if ($awal == false && $akhir == false) {
            $total = $this->db->query("SELECT SUM(jml_terima) AS total FROM bukuuangmasuk");
            return $total->getResultArray();
        }
        return $this->db->query("SELECT SUM(jml_terima) AS total FROM bukuuangmasuk WHERE tanggal BETWEEN '$awal' AND '$akhir' ORDER BY no DESC")->getResultArray();
    }

    public function getTanggal()
    {
        $query = $this->db->query("SELECT DISTINCT tanggal FROM bukuuangmasuk Order by tanggal");
        return $query->getResultArray();
    }

    public function getRange($awal, $akhir)
    {
        $range = $this->db->query("SELECT * FROM bukuuangmasuk
        WHERE tanggal BETWEEN '$awal' AND '$akhir' ORDER BY tanggal ASC");
        return $range->getResultArray();
    }
}
