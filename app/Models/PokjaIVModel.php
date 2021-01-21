<?php

namespace App\Models;

use CodeIgniter\Model;

class PokjaIVModel extends Model
{
    protected $table = 'pokja4';
    protected $useTimestamps = true;
    protected $allowedFields = ['tanggal', 'tahun', 'kd_wilayah', 'jml_kader_posyandu', 'jml_kader_gizi', 'jml_kader_kesling', 'jml_kader_narkoba', 'jml_kader_phbs', 'jml_kader_kb', 'jml_posyandu_ksht', 'jml_posyandu_integrasi', 'jml_klp_lansia_posyandu', 'jml_anggota_lansia_posyandu', 'jml_kartu_lansia_posyandu', 'jml_rmh_jamban_kshtlh', 'jml_rmh_spal_kshtlh', 'jml_rmh_sampah_kshtlh', 'jml_mck_kshtlh', 'jml_air_pdam_kshtlh', 'jml_air_sumur_kshtlh', 'jml_air_lain_kshtlh', 'jml_pus_rncnsehat', 'jml_wus_rncnsehat', 'jml_akseptorl_rncnsehat', 'jml_akseptorp_rncnsehat', 'jml_tabkel_rncnsehat', 'keterangan'];

    public function getPokjaIV($num = false)
    {
        if ($num == false) {
            return $this->findAll();
        }
        return $this->where(['no' => $num])->first();
    }

    public function getTahun()
    {
        $query = $this->db->query("SELECT DISTINCT tahun FROM pokja4 Order by tahun");
        return $query->getResultArray();
    }

    public function getData($th)
    {
        if ($th == null) {
            return $this->findAll();
        } elseif ($th != null) {
            $query = $this->db->query("SELECT * FROM pokja4 WHERE tahun = $th");
            return $query->getResultArray();
        }
    }

    public function getTanggal()
    {
        $query = $this->db->query("SELECT DISTINCT tanggal FROM pokja4 Order by tanggal");
        return $query->getResultArray();
    }

    public function getWilayah()
    {
        return $this->db->table('wilayah')->get()->getResultArray();
    }

    public function getRange($awal, $akhir)
    {
        $range = $this->db->query("SELECT * FROM pokja4
        WHERE tanggal BETWEEN '$awal' AND '$akhir' ORDER BY no DESC");
        return $range->getResultArray();
    }

    public function getTotal($th)
    {
        $total = $this->db->query("SELECT
        SUM(IF(tahun = $th, jml_kader_posyandu, 0)) AS totalkaderpos,
        SUM(IF(tahun = $th, jml_kader_gizi, 0)) AS totalkadergizi,
        SUM(IF(tahun = $th, jml_kader_kesling, 0)) AS totalkaderkesling,
        SUM(IF(tahun = $th, jml_kader_narkoba, 0)) AS totalkadernarkoba,
        SUM(IF(tahun = $th, jml_kader_phbs, 0)) AS totalkaderphbs,
        SUM(IF(tahun = $th, jml_kader_kb, 0)) AS totalkaderkb,
        SUM(IF(tahun = $th, jml_posyandu_ksht, 0)) AS totalposyandu,
        SUM(IF(tahun = $th, jml_posyandu_integrasi, 0)) AS totalposterinteg,
        SUM(IF(tahun = $th, jml_klp_lansia_posyandu, 0)) AS totalklplansia,
        SUM(IF(tahun = $th, jml_anggota_lansia_posyandu, 0)) AS totalanggotalansia,
        SUM(IF(tahun = $th, jml_kartu_lansia_posyandu, 0)) AS totalkartulansia,
        SUM(IF(tahun = $th, jml_rmh_jamban_kshtlh, 0)) AS totalrmhjamban,
        SUM(IF(tahun = $th, jml_rmh_spal_kshtlh, 0)) AS totalrmhspal,
        SUM(IF(tahun = $th, jml_rmh_sampah_kshtlh, 0)) AS totalrmhsampah,
        SUM(IF(tahun = $th, jml_mck_kshtlh, 0)) AS totalmck,
        SUM(IF(tahun = $th, jml_air_pdam_kshtlh, 0)) AS totalpdam,
        SUM(IF(tahun = $th, jml_air_sumur_kshtlh, 0)) AS totalsumur,
        SUM(IF(tahun = $th, jml_air_lain_kshtlh, 0)) AS totalairlain,
        SUM(IF(tahun = $th, jml_pus_rncnsehat, 0)) AS totalpus,
        SUM(IF(tahun = $th, jml_wus_rncnsehat, 0)) AS totalwus,
        SUM(IF(tahun = $th, jml_akseptorl_rncnsehat, 0)) AS totalakseptorL,
        SUM(IF(tahun = $th, jml_akseptorp_rncnsehat, 0)) AS totalakseptorP,
        SUM(IF(tahun = $th, jml_tabkel_rncnsehat, 0)) AS totaltabungan FROM pokja4");
        return $total->getResultArray();
    }

    public function getTotalCetak($awal, $akhir)
    {
        $total = $this->db->query("SELECT
        SUM(jml_kader_posyandu) AS totalkaderpos,
        SUM(jml_kader_gizi) AS totalkadergizi,
        SUM(jml_kader_kesling) AS totalkaderkesling,
        SUM(jml_kader_narkoba) AS totalkadernarkoba,
        SUM(jml_kader_phbs) AS totalkaderphbs,
        SUM(jml_kader_kb) AS totalkaderkb,
        SUM(jml_posyandu_ksht) AS totalposyandu,
        SUM(jml_posyandu_integrasi) AS totalposterinteg,
        SUM(jml_klp_lansia_posyandu) AS totalklplansia,
        SUM(jml_anggota_lansia_posyandu) AS totalanggotalansia,
        SUM(jml_kartu_lansia_posyandu) AS totalkartulansia,
        SUM(jml_rmh_jamban_kshtlh) AS totalrmhjamban,
        SUM(jml_rmh_spal_kshtlh) AS totalrmhspal,
        SUM(jml_rmh_sampah_kshtlh) AS totalrmhsampah,
        SUM(jml_mck_kshtlh) AS totalmck,
        SUM(jml_air_pdam_kshtlh) AS totalpdam,
        SUM(jml_air_sumur_kshtlh) AS totalsumur,
        SUM(jml_air_lain_kshtlh) AS totalairlain,
        SUM(jml_pus_rncnsehat) AS totalpus,
        SUM(jml_wus_rncnsehat) AS totalwus,
        SUM(jml_akseptorl_rncnsehat) AS totalakseptorL,
        SUM(jml_akseptorp_rncnsehat) AS totalakseptorP,
        SUM(jml_tabkel_rncnsehat) AS totaltabungan FROM pokja4 WHERE tanggal BETWEEN '$awal' AND '$akhir' ORDER BY no DESC");
        return $total->getResultArray();
    }
}
