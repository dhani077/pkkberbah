<?php

namespace App\Models;

use CodeIgniter\Model;

class DataumumtppkkkecModel extends Model
{
    protected $table = 'dataumumtppkkkecamatan';
    protected $useTimestamps = true;
    protected $allowedFields = ['tanggal', 'tahun', 'nama_wilayah', 'jml_klp_dusun', 'jml_klp_pkkrw', 'jml_klp_pkkrt', 'jml_klp_dasawisma', 'jml_krt', 'jml_kk', 'jml_jiwa_L', 'jml_jiwa_P', 'jml_kader_angL', 'jml_kader_angP', 'jml_kader_umumL', 'jml_kader_umumP', 'jml_kader_khususL', 'jml_kader_khususP', 'jml_skrt_honorerL', 'jml_skrt_honorerP', 'jml_skrt_bantuanL', 'jml_skrt_bantuanP', 'keterangan'];

    public function getDataumumtppkkkec($num = false)
    {
        if ($num == false) {
            return $this->findAll();
        }

        return $this->where(['no' => $num])->first();
    }

    public function getTanggal()
    {
        $query = $this->db->query("SELECT DISTINCT tanggal FROM dataumumtppkkkecamatan Order by tanggal");
        return $query->getResultArray();
    }

    public function getTahun()
    {
        $query = $this->db->query("SELECT DISTINCT tahun FROM dataumumtppkkkecamatan Order by tahun");
        return $query->getResultArray();
    }

    public function getData($th)
    {
        $query = $this->db->query("SELECT * FROM dataumumtppkkkecamatan WHERE tahun = $th");
        return $query->getResultArray();
    }

    public function getWilayah()
    {
        return $this->db->table('wilayah')->get()->getResultArray();
    }

    public function getRange($awal, $akhir)
    {
        $range = $this->db->query("SELECT * FROM dataumumtppkkkecamatan
        WHERE tanggal BETWEEN '$awal' AND '$akhir' ORDER BY no DESC");
        return $range->getResultArray();
    }

    public function getTotal($th)
    {
        $total = $this->db->query("SELECT
        SUM(IF(tahun = $th, jml_klp_dusun, 0)) AS totaldusun,
        SUM(IF(tahun = $th, jml_klp_pkkrw, 0)) AS totalrw,
        SUM(IF(tahun = $th, jml_klp_pkkrt, 0)) AS totalrt,
        SUM(IF(tahun = $th, jml_klp_dasawisma, 0)) AS totaldasawisma,
        SUM(IF(tahun = $th, jml_krt, 0)) AS totalkrt,
        SUM(IF(tahun = $th, jml_kk, 0)) AS totalkk,
        SUM(IF(tahun = $th, jml_jiwa_L, 0)) AS totalL,
        SUM(IF(tahun = $th, jml_jiwa_P, 0)) AS totalP,
        SUM(IF(tahun = $th, jml_kader_angL, 0)) AS totalangL,
        SUM(IF(tahun = $th, jml_kader_angP, 0)) AS totalangP,
        SUM(IF(tahun = $th, jml_kader_umumL, 0)) AS totalumumL,
        SUM(IF(tahun = $th, jml_kader_umumP, 0)) AS totalumumP,
        SUM(IF(tahun = $th, jml_kader_khususL, 0)) AS totalkhususL,
        SUM(IF(tahun = $th, jml_kader_khususP, 0)) AS totalkhususP,
        SUM(IF(tahun = $th, jml_skrt_honorerL, 0)) AS totalhonorerL,
        SUM(IF(tahun = $th, jml_skrt_honorerP, 0)) AS totalhonorerP,
        SUM(IF(tahun = $th, jml_skrt_bantuanL, 0)) AS totalbantuanL,
        SUM(IF(tahun = $th, jml_skrt_bantuanP, 0)) AS totalbantuanP FROM dataumumtppkkkecamatan");
        return $total->getResultArray();
    }

    public function getTotalCetak($awal, $akhir)
    {
        $total = $this->db->query("SELECT
        SUM(jml_klp_dusun) AS totaldusun,
        SUM(jml_klp_pkkrw) AS totalrw,
        SUM(jml_klp_pkkrt) AS totalrt,
        SUM(jml_klp_dasawisma) AS totaldasawisma,
        SUM(jml_krt) AS totalkrt,
        SUM(jml_kk) AS totalkk,
        SUM(jml_jiwa_L) AS totalL,
        SUM(jml_jiwa_P) AS totalP,
        SUM(jml_kader_angL) AS totalangL,
        SUM(jml_kader_angP) AS totalangP,
        SUM(jml_kader_umumL) AS totalumumL,
        SUM(jml_kader_umumP) AS totalumumP,
        SUM(jml_kader_khususL) AS totalkhususL,
        SUM(jml_kader_khususP) AS totalkhususP,
        SUM(jml_skrt_honorerL) AS totalhonorerL,
        SUM(jml_skrt_honorerP) AS totalhonorerP,
        SUM(jml_skrt_bantuanL) AS totalbantuanL,
        SUM(jml_skrt_bantuanP) AS totalbantuanP FROM dataumumtppkkkecamatan WHERE tanggal BETWEEN '$awal' AND '$akhir' ORDER BY no DESC");
        return $total->getResultArray();
    }
}
