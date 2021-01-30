<?php

namespace App\Models;

use CodeIgniter\Model;

class PokjaIModel extends Model
{
    protected $table = 'pokja1';
    protected $useTimestamps = true;
    protected $allowedFields = ['tanggal', 'tahun', 'kd_wilayah', 'jml_kader_pkbn', 'jml_kader_pkdrt', 'jml_kader_polaasuh', 'jml_klp_simulasi_pkbn', 'jml_anggota_pkbn', 'jml_klp_simulasi_pkdrt', 'jml_anggota_pkdrt', 'jml_klp_polaasuh', 'jml_anggota_polaasuh', 'jml_klp_lansia', 'jml_anggota_lansia', 'jml_klp_kerjabakti', 'jml_klp_rknmati', 'jml_klp_keagamaan', 'jml_klp_jimpitan', 'jml_klp_arisan', 'keterangan'];

    public function getPokjaI($num = false)
    {
        if ($num == false) {
            return $this->findAll();
        }

        return $this->where(['no' => $num])->first();
    }

    public function getTanggal()
    {
        $query = $this->db->query("SELECT DISTINCT tanggal FROM pokja1 Order by tanggal");
        return $query->getResultArray();
    }

    public function getTahun()
    {
        $query = $this->db->query("SELECT DISTINCT tahun FROM pokja1 Order by tahun");
        return $query->getResultArray();
    }

    public function getWilayah()
    {
        return $this->db->table('wilayah')->get()->getResultArray();
    }

    public function getData($th)
    {
        if ($th == null) {
            return $this->findAll();
        } elseif ($th != null) {
            $query = $this->db->query("SELECT * FROM pokja1 WHERE tahun = $th Order by tahun");
            return $query->getResultArray();
        }
    }

    public function getRange($awal, $akhir)
    {
        $range = $this->db->query("SELECT * FROM pokja1
        WHERE tanggal BETWEEN '$awal' AND '$akhir' ORDER BY no DESC");
        return $range->getResultArray();
    }

    public function getTotal($th)
    {
        $total = $this->db->query("SELECT SUM(IF(tahun = $th, jml_kader_pkbn, 0)) AS totalpkbn,
        SUM(IF(tahun = $th, jml_kader_pkdrt, 0)) AS totalpkdrt,
        SUM(IF(tahun = $th, jml_kader_polaasuh, 0)) AS totalpola,
        SUM(IF(tahun = $th, jml_klp_simulasi_pkbn, 0)) AS totalklppkbn,
        SUM(IF(tahun = $th, jml_anggota_pkbn, 0)) AS totalanggotapkbn,
        SUM(IF(tahun = $th, jml_klp_simulasi_pkdrt, 0)) AS totalklppkdrt,
        SUM(IF(tahun = $th, jml_anggota_pkdrt, 0)) AS totalanggotapkdrt,
        SUM(IF(tahun = $th, jml_klp_polaasuh, 0)) AS totalklppola,
        SUM(IF(tahun = $th, jml_anggota_polaasuh, 0)) AS totalanggotapola,
        SUM(IF(tahun = $th, jml_klp_lansia, 0)) AS totalklplansia,
        SUM(IF(tahun = $th, jml_anggota_lansia, 0)) AS totalanggotalansia,
        SUM(IF(tahun = $th, jml_klp_kerjabakti, 0)) AS totalklpbakti,
        SUM(IF(tahun = $th, jml_klp_keagamaan, 0)) AS totalklpagama,
        SUM(IF(tahun = $th, jml_klp_rknmati, 0)) AS totalklpmati,
        SUM(IF(tahun = $th, jml_klp_jimpitan, 0)) AS totalklpjimpit,
        SUM(IF(tahun = $th, jml_klp_arisan, 0)) AS totalklparisan FROM pokja1");
        return $total->getResultArray();
    }

    public function getTotalCetak($awal, $akhir)
    {
        $total = $this->db->query("SELECT SUM(jml_kader_pkbn) AS totalpkbn,
        SUM(jml_kader_pkdrt) AS totalpkdrt,
        SUM(jml_kader_polaasuh) AS totalpola,
        SUM(jml_klp_simulasi_pkbn) AS totalklppkbn,
        SUM(jml_anggota_pkbn) AS totalanggotapkbn,
        SUM(jml_klp_simulasi_pkdrt) AS totalklppkdrt,
        SUM(jml_anggota_pkdrt) AS totalanggotapkdrt,
        SUM(jml_klp_polaasuh) AS totalklppola,
        SUM(jml_anggota_polaasuh) AS totalanggotapola,
        SUM(jml_klp_lansia) AS totalklplansia,
        SUM(jml_anggota_lansia) AS totalanggotalansia,
        SUM(jml_klp_kerjabakti) AS totalklpbakti,
        SUM(jml_klp_keagamaan) AS totalklpagama,
        SUM(jml_klp_rknmati) AS totalklpmati,
        SUM(jml_klp_jimpitan) AS totalklpjimpit,
        SUM(jml_klp_arisan) AS totalklparisan FROM pokja1 WHERE tanggal BETWEEN '$awal' AND '$akhir' ORDER BY no DESC");
        return $total->getResultArray();
    }
}
