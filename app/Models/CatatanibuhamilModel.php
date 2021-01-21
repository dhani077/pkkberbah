<?php

namespace App\Models;

use CodeIgniter\Model;

class CatatanibuhamilModel extends Model
{
    protected $table = 'catatanibuhamilkecamatan';
    protected $useTimestamps = true;
    protected $allowedFields = ['tanggal', 'bulan', 'tahun', 'nama_kelurahan', 'jml_dusun', 'jml_rw', 'jml_rt', 'jml_dasawisma', 'jml_ibu_hamil', 'jml_ibu_melahir', 'jml_ibu_nifas', 'jml_ibu_mngl', 'jml_bayi_lahirL', 'jml_bayi_LahirP', 'jml_bayi_akte_ada', 'jml_bayi_akte_tidak', 'jml_bayi_mnglL', 'jml_bayi_mnglP', 'jml_balita_mnglL', 'jml_balita_mnglP', 'keterangan'];

    public function getCatatanibuhamil($num = false)
    {
        if ($num == false) {
            return $this->findAll();
        }

        return $this->where(['no' => $num])->first();
    }
    public function getTahun($num = false)
    {
        $query = $this->db->query("SELECT DISTINCT tahun FROM catatanibuhamilkecamatan WHERE tahun Order by tahun");
        return $query->getResultArray();
    }
    public function getBulan($num = false)
    {
        $query = $this->db->query("SELECT DISTINCT bulan FROM catatanibuhamilkecamatan WHERE tahun Order by bulan ASC");
        return $query->getResultArray();
    }

    public function getData($bl, $th)
    {
        $query = $this->db->query("SELECT * FROM catatanibuhamilkecamatan WHERE bulan = '$bl' and tahun = $th");
        return $query->getResultArray();
    }
    public function getWilayah()
    {
        return $this->db->table('wilayah')->get()->getResultArray();
    }

    public function hitung($awal, $akhir)
    {
        $query = $this->db->query("SELECT COUNT(bulan) as jumlah FROM catatanibuhamilkecamatan WHERE tanggal BETWEEN '$awal' AND '$akhir'");
        return $query->getRowArray();
    }

    public function getTanggal()
    {
        $query = $this->db->query("SELECT DISTINCT tanggal FROM catatanibuhamilkecamatan Order by tanggal");
        return $query->getResultArray();
    }

    public function getRange($awal, $akhir)
    {
        $range = $this->db->query("SELECT * FROM catatanibuhamilkecamatan
        WHERE tanggal BETWEEN '$awal' AND '$akhir' ORDER BY no DESC");
        return $range->getResultArray();
    }

    public function getTotal($bulan, $th)
    {
        $total = $this->db->query("SELECT SUM(IF(bulan = '$bulan' AND tahun = $th, jml_dusun, 0)) AS totaldusun,
        SUM(IF(bulan = '$bulan' AND tahun = $th, jml_rw, 0)) AS totalrw,
        SUM(IF(bulan = '$bulan' AND tahun = $th, jml_rt, 0)) AS totalrt,
        SUM(IF(bulan = '$bulan' AND tahun = $th, jml_dasawisma, 0)) AS totaldasawisma,
        SUM(IF(bulan = '$bulan' AND tahun = $th, jml_ibu_hamil, 0)) AS totalhamil,
        SUM(IF(bulan = '$bulan' AND tahun = $th, jml_ibu_melahir, 0)) AS totallahir,
        SUM(IF(bulan = '$bulan' AND tahun = $th, jml_ibu_nifas, 0)) AS totalnifas,
        SUM(IF(bulan = '$bulan' AND tahun = $th, jml_ibu_mngl, 0)) AS totalmngl,
        SUM(IF(bulan = '$bulan' AND tahun = $th, jml_bayi_lahirL, 0)) AS totallahirL,
        SUM(IF(bulan = '$bulan' AND tahun = $th, jml_bayi_LahirP, 0)) AS totallahirP,
        SUM(IF(bulan = '$bulan' AND tahun = $th, jml_bayi_akte_ada, 0)) AS totalakte,
        SUM(IF(bulan = '$bulan' AND tahun = $th, jml_bayi_akte_tidak, 0)) AS totalaktetdk,
        SUM(IF(bulan = '$bulan' AND tahun = $th, jml_bayi_mnglL, 0)) AS totalmnglL,
        SUM(IF(bulan = '$bulan' AND tahun = $th, jml_bayi_mnglP, 0)) AS totalmnglP,
        SUM(IF(bulan = '$bulan' AND tahun = $th, jml_balita_mnglL, 0)) AS totalblitmnglL,
        SUM(IF(bulan = '$bulan' AND tahun = $th, jml_balita_mnglP, 0)) AS totalblitmnglP FROM catatanibuhamilkecamatan");
        return $total->getResultArray();
    }

    public function getTotalCetak($awal, $akhir)
    {
        $total = $this->db->query("SELECT 
        SUM(jml_dusun) AS totaldusun,
        SUM(jml_rw) AS totalrw,
        SUM(jml_rt) AS totalrt,
        SUM(jml_dasawisma) AS totaldasawisma,
        SUM(jml_ibu_hamil) AS totalhamil,
        SUM(jml_ibu_melahir) AS totallahir,
        SUM(jml_ibu_nifas) AS totalnifas,
        SUM(jml_ibu_mngl) AS totalmngl,
        SUM(jml_bayi_lahirL) AS totallahirL,
        SUM(jml_bayi_LahirP) AS totallahirP,
        SUM(jml_bayi_akte_ada) AS totalakte,
        SUM(jml_bayi_akte_tidak) AS totalaktetdk,
        SUM(jml_bayi_mnglL) AS totalmnglL,
        SUM(jml_bayi_mnglP) AS totalmnglP,
        SUM(jml_balita_mnglL) AS totalblitmnglL,
        SUM(jml_balita_mnglP) AS totalblitmnglP FROM catatanibuhamilkecamatan WHERE tanggal BETWEEN '$awal' AND '$akhir' ORDER BY no DESC");
        return $total->getResultArray();
    }
}
