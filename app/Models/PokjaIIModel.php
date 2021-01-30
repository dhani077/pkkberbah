<?php

namespace App\Models;

use CodeIgniter\Model;

class PokjaIIModel extends Model
{
    protected $table = 'pokja2';
    protected $useTimestamps = true;
    protected $allowedFields = ['tanggal', 'tahun', 'kd_wilayah', 'jml_wrg_tiga_buta', 'jml_klp_bljr_paketa', 'jml_wrg_bljr_paketa', 'jml_klp_bljr_paketb', 'jml_wrg_bljr_paketb', 'jml_klp_bljr_paketc', 'jml_wrg_bljr_paketc', 'jml_klp_bljr_kf', 'jml_klp_bljr_kf_wrgbljr', 'jml_klp_bljr_paud', 'jml_perpus', 'jml_klp_bkb', 'jml_ibu_peserta_bkb', 'jml_ape_bkb', 'jml_klp_simulasi_bkb', 'jml_tuto_kf', 'jml_tuto_paud_kader', 'jml_bkb_kader', 'jml_koperasi_kader', 'jml_ktrmpilan_kader', 'jml_lp3_kader_latih', 'jml_tpk3_kader_latih', 'jml_damas_kader_latih', 'jml_klp_pemula_prakop', 'jml_psrt_pemula_prakop', 'jml_klp_madya_prakop', 'jml_psrt_madya_prakop', 'jml_klp_utama_prakop', 'jml_psrt_utama_prakop', 'jml_klp_mandiri_prakop', 'jml_psrt_mandiri_prakop', 'jml_klp_kophkm', 'jml_anggota_kophkm', 'keterangan'];

    public function getPokjaII($num = false)
    {
        if ($num == false) {
            return $this->findAll();
        }

        return $this->where(['no' => $num])->first();
    }

    public function getTanggal()
    {
        $query = $this->db->query("SELECT DISTINCT tanggal FROM pokja2 Order by tanggal");
        return $query->getResultArray();
    }

    public function getTahun()
    {
        $query = $this->db->query("SELECT DISTINCT tahun FROM pokja2 Order by tahun");
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
            $query = $this->db->query("SELECT * FROM pokja2 WHERE tahun = $th");
            return $query->getResultArray();
        }
    }

    public function getRange($awal, $akhir)
    {
        $range = $this->db->query("SELECT * FROM pokja2
        WHERE tanggal BETWEEN '$awal' AND '$akhir' ORDER BY no DESC");
        return $range->getResultArray();
    }

    public function getTotal($th)
    {
        $total = $this->db->query("SELECT
        SUM(IF(tahun = $th, jml_wrg_tiga_buta, 0)) AS totalbuta,
        SUM(IF(tahun = $th, jml_klp_bljr_paketa, 0)) AS totalklpa,
        SUM(IF(tahun = $th, jml_wrg_bljr_paketa, 0)) AS totalpaketA,
        SUM(IF(tahun = $th, jml_klp_bljr_paketb, 0)) AS totalklpB,
        SUM(IF(tahun = $th, jml_wrg_bljr_paketb, 0)) AS totalpaketB,
        SUM(IF(tahun = $th, jml_klp_bljr_paketc, 0)) AS totalklpC,
        SUM(IF(tahun = $th, jml_wrg_bljr_paketc, 0)) AS totalpaketC,
        SUM(IF(tahun = $th, jml_klp_bljr_kf, 0)) AS totalklpKF,
        SUM(IF(tahun = $th, jml_klp_bljr_kf_wrgbljr, 0)) AS totalpaketKF,
        SUM(IF(tahun = $th, jml_klp_bljr_paud, 0)) AS totalklppaud,
        SUM(IF(tahun = $th, jml_perpus, 0)) AS totalperpus,
        SUM(IF(tahun = $th, jml_klp_bkb, 0)) AS totalklpbkb,
        SUM(IF(tahun = $th, jml_ibu_peserta_bkb, 0)) AS totalpesertabkb,
        SUM(IF(tahun = $th, jml_ape_bkb, 0)) AS totalapebkb,
        SUM(IF(tahun = $th, jml_klp_simulasi_bkb, 0)) AS totalsimulasibkb,
        SUM(IF(tahun = $th, jml_tuto_kf, 0)) AS totaltutoKF,
        SUM(IF(tahun = $th, jml_tuto_paud_kader, 0)) AS totalpaudkader,
        SUM(IF(tahun = $th, jml_bkb_kader, 0)) AS totalbkbkader,
        SUM(IF(tahun = $th, jml_koperasi_kader, 0)) AS totalkoperasikader,
        SUM(IF(tahun = $th, jml_ktrmpilan_kader, 0)) AS totalktrmpilankader,
        SUM(IF(tahun = $th, jml_lp3_kader_latih, 0)) AS totallp3kader,
        SUM(IF(tahun = $th, jml_tpk3_kader_latih, 0)) AS totaltpk3kader,
        SUM(IF(tahun = $th, jml_damas_kader_latih, 0)) AS totaldamaskader,
        SUM(IF(tahun = $th, jml_klp_pemula_prakop, 0)) AS totalklppemula,
        SUM(IF(tahun = $th, jml_psrt_pemula_prakop, 0)) AS totalpsrtpemula,
        SUM(IF(tahun = $th, jml_klp_madya_prakop, 0)) AS totalklpmadya,
        SUM(IF(tahun = $th, jml_psrt_madya_prakop, 0)) AS totalpsrtmadya,
        SUM(IF(tahun = $th, jml_klp_utama_prakop, 0)) AS totalklputama,
        SUM(IF(tahun = $th, jml_psrt_utama_prakop, 0)) AS totalpsrtutama,
        SUM(IF(tahun = $th, jml_klp_mandiri_prakop, 0)) AS totalklpmandiri,
        SUM(IF(tahun = $th, jml_psrt_mandiri_prakop, 0)) AS totalpsrtmandiri,
        SUM(IF(tahun = $th, jml_klp_kophkm, 0)) AS totalklphkm,
        SUM(IF(tahun = $th, jml_anggota_kophkm, 0)) AS totalanggotahkm 
        FROM pokja2");
        return $total->getResultArray();
    }

    public function getTotalCetak($awal, $akhir)
    {
        $total = $this->db->query("SELECT
        SUM(jml_wrg_tiga_buta) AS totalbuta,
        SUM(jml_klp_bljr_paketa) AS totalklpa,
        SUM(jml_wrg_bljr_paketa) AS totalpaketA,
        SUM(jml_klp_bljr_paketb) AS totalklpB,
        SUM(jml_wrg_bljr_paketb) AS totalpaketB,
        SUM(jml_klp_bljr_paketc) AS totalklpC,
        SUM(jml_wrg_bljr_paketc) AS totalpaketC,
        SUM(jml_klp_bljr_kf) AS totalklpKF,
        SUM(jml_klp_bljr_kf_wrgbljr) AS totalpaketKF,
        SUM(jml_klp_bljr_paud) AS totalklppaud,
        SUM(jml_perpus) AS totalperpus,
        SUM(jml_klp_bkb) AS totalklpbkb,
        SUM(jml_ibu_peserta_bkb) AS totalpesertabkb,
        SUM(jml_ape_bkb) AS totalapebkb,
        SUM(jml_klp_simulasi_bkb) AS totalsimulasibkb,
        SUM(jml_tuto_kf) AS totaltutoKF,
        SUM(jml_tuto_paud_kader) AS totalpaudkader,
        SUM(jml_bkb_kader) AS totalbkbkader,
        SUM(jml_koperasi_kader) AS totalkoperasikader,
        SUM(jml_ktrmpilan_kader) AS totalktrmpilankader,
        SUM(jml_lp3_kader_latih) AS totallp3kader,
        SUM(jml_tpk3_kader_latih) AS totaltpk3kader,
        SUM(jml_damas_kader_latih) AS totaldamaskader,
        SUM(jml_klp_pemula_prakop) AS totalklppemula,
        SUM(jml_psrt_pemula_prakop) AS totalpsrtpemula,
        SUM(jml_klp_madya_prakop) AS totalklpmadya,
        SUM(jml_psrt_madya_prakop) AS totalpsrtmadya,
        SUM(jml_klp_utama_prakop) AS totalklputama,
        SUM(jml_psrt_utama_prakop) AS totalpsrtutama,
        SUM(jml_klp_mandiri_prakop) AS totalklpmandiri,
        SUM(jml_psrt_mandiri_prakop) AS totalpsrtmandiri,
        SUM(jml_klp_kophkm) AS totalklphkm,
        SUM(jml_anggota_kophkm) AS totalanggotahkm 
        FROM pokja2 WHERE tanggal BETWEEN '$awal' AND '$akhir' ORDER BY no DESC");
        return $total->getResultArray();
    }
}
