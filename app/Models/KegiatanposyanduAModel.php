<?php

namespace App\Models;

use CodeIgniter\Model;

class KegiatanposyanduAModel extends Model
{
    protected $table = 'kegiatanposyandu';
    protected $useTimestamps = true;
    protected $allowedFields = ['kd_posyandu', 'tanggal', 'tahun', 'bulan', 'jml_ibu_hamil', 'jml_diperiksa', 'jml_fe_tab', 'jml_ibu_nyusu', 'jml_aseptor_kondom', 'jml_aseptor_pi', 'jml_aseptor_implant', 'jml_aseptor_mop', 'jml_aseptor_mow', 'jml_aseptor_iud', 'jml_aseptor_suntik', 'jml_aseptor_lain', 'jml_balita_s_timbangL', 'jml_balita_s_timbangP', 'jml_balita_kms_timbangL', 'jml_balita_kms_timbangP', 'jml_balita_d_timbangL', 'jml_balita_d_timbangP', 'jml_balita_naik_timbangL', 'jml_balita_naik_timbangP', 'jml_balita_vita_timbangL', 'jml_balita_vita_timbangP', 'jml_balita_pmt_timbangL', 'jml_balita_pmt_timbangP', 'jml_imunisasi_ibu_I', 'jml_imunisasi_ibu_II'];

    public function getKegiatanA($num = false)
    {
        if ($num == false) {
            return $this->db->table('kegiatanposyandu')
                ->join('posyandu', 'kegiatanposyandu.kd_posyandu=posyandu.kd_posyandu')
                ->get()->getResultArray();
        }
        return $this->where(['kd_posyandu' => $num])->findAll();
    }
    public function getWhereA($num, $th)
    {
        $query = $this->db->query("SELECT * FROM kegiatanposyandu JOIN posyandu ON kegiatanposyandu.kd_posyandu = posyandu.kd_posyandu WHERE kegiatanposyandu.kd_posyandu = $num and kegiatanposyandu.tahun = $th");
        return $query->getResultArray();
    }
    public function getA($num = false)
    {
        if ($num == false) {
            return $this->db->table('kegiatanposyandu')
                ->join('posyandu', 'kegiatanposyandu.kd_posyandu=posyandu.kd_posyandu')
                ->get()->getResultArray();
        }
        return $this->where(['kd_posyandu' => $num])->findAll();
    }
    public function getEditA($num = false)
    {
        if ($num == false) {
            return $this->db->table('kegiatanposyandu')
                ->join('posyandu', 'kegiatanposyandu.kd_posyandu=posyandu.kd_posyandu')
                ->get()->getResultArray();
        }
        return $this->where(['no' => $num])->first();
    }

    public function getTerbaru($num = false)
    {
        $query = $this->db->query("SELECT * FROM kegiatanposyandu ORDER BY no DESC LIMIT 1");
        return $query->getResultArray();
    }

    public function getTahun($num = false)
    {
        $query = $this->db->query("SELECT DISTINCT kegiatanposyandu.tahun FROM kegiatanposyandu JOIN posyandu ON kegiatanposyandu.kd_posyandu = posyandu.kd_posyandu WHERE kegiatanposyandu.kd_posyandu = $num Order by kegiatanposyandu.tahun");
        return $query->getResultArray();
    }

    public function hitung($kdPosyandu, $th)
    {
        $query = $this->db->query("SELECT COUNT(tahun) as jumlah FROM kegiatanposyandu WHERE kegiatanposyandu.kd_posyandu = $kdPosyandu and kegiatanposyandu.tahun = $th");
        return $query->getResultArray();
    }

    public function getTotalA($kdposyandu, $tahun)
    {
        $total = $this->db->query("SELECT SUM(IF(kd_posyandu = '$kdposyandu' AND tahun = $tahun, jml_ibu_hamil, 0)) AS totalibuhamil,
        SUM(IF(kd_posyandu = '$kdposyandu' AND tahun = $tahun, jml_diperiksa, 0)) AS totaldpriksa,
        SUM(IF(kd_posyandu = '$kdposyandu' AND tahun = $tahun, jml_fe_tab, 0)) AS totalfetab,
        SUM(IF(kd_posyandu = '$kdposyandu' AND tahun = $tahun, jml_ibu_nyusu, 0)) AS totalibunyusu,
        SUM(IF(kd_posyandu = '$kdposyandu' AND tahun = $tahun, jml_aseptor_kondom, 0)) AS totalkondom,
        SUM(IF(kd_posyandu = '$kdposyandu' AND tahun = $tahun, jml_aseptor_pi, 0)) AS totalpi,
        SUM(IF(kd_posyandu = '$kdposyandu' AND tahun = $tahun, jml_aseptor_implant, 0)) AS totalimplant,
        SUM(IF(kd_posyandu = '$kdposyandu' AND tahun = $tahun, jml_aseptor_mop, 0)) AS totalmop,
        SUM(IF(kd_posyandu = '$kdposyandu' AND tahun = $tahun, jml_aseptor_mow, 0)) AS totalmow,
        SUM(IF(kd_posyandu = '$kdposyandu' AND tahun = $tahun, jml_aseptor_iud, 0)) AS totaliud,
        SUM(IF(kd_posyandu = '$kdposyandu' AND tahun = $tahun, jml_aseptor_suntik, 0)) AS totalsuntik,
        SUM(IF(kd_posyandu = '$kdposyandu' AND tahun = $tahun, jml_aseptor_lain, 0)) AS totallain,
        SUM(IF(kd_posyandu = '$kdposyandu' AND tahun = $tahun, jml_balita_s_timbangL, 0)) AS totalbltsL,
        SUM(IF(kd_posyandu = '$kdposyandu' AND tahun = $tahun, jml_balita_s_timbangP, 0)) AS totalbltsP,
        SUM(IF(kd_posyandu = '$kdposyandu' AND tahun = $tahun, jml_balita_kms_timbangL, 0)) AS totalbltkmsL,
        SUM(IF(kd_posyandu = '$kdposyandu' AND tahun = $tahun, jml_balita_kms_timbangP, 0)) AS totalbltkmsP,
        SUM(IF(kd_posyandu = '$kdposyandu' AND tahun = $tahun, jml_balita_d_timbangL, 0)) AS totalbltdL,
        SUM(IF(kd_posyandu = '$kdposyandu' AND tahun = $tahun, jml_balita_d_timbangP, 0)) AS totalbltdP,
        SUM(IF(kd_posyandu = '$kdposyandu' AND tahun = $tahun, jml_balita_naik_timbangL, 0)) AS totalbltNaikL,
        SUM(IF(kd_posyandu = '$kdposyandu' AND tahun = $tahun, jml_balita_naik_timbangP, 0)) AS totalbltNaikP,
        SUM(IF(kd_posyandu = '$kdposyandu' AND tahun = $tahun, jml_balita_vita_timbangL, 0)) AS totalbltvitaL,
        SUM(IF(kd_posyandu = '$kdposyandu' AND tahun = $tahun, jml_balita_vita_timbangP, 0)) AS totalbltvitaP,
        SUM(IF(kd_posyandu = '$kdposyandu' AND tahun = $tahun, jml_balita_pmt_timbangL, 0)) AS totalbltpmtL,
        SUM(IF(kd_posyandu = '$kdposyandu' AND tahun = $tahun, jml_balita_pmt_timbangP, 0)) AS totalbltpmtP,
        SUM(IF(kd_posyandu = '$kdposyandu' AND tahun = $tahun, jml_imunisasi_ibu_I, 0)) AS totalibuI,
        SUM(IF(kd_posyandu = '$kdposyandu' AND tahun = $tahun, jml_imunisasi_ibu_II, 0)) AS totalibuII FROM kegiatanposyandu");
        return $total->getResultArray();
    }

    public function getTanggal($kdposyandu)
    {
        $query = $this->db->query("SELECT DISTINCT tanggal FROM kegiatanposyandu WHERE kd_posyandu = $kdposyandu Order by tanggal");
        return $query->getResultArray();
    }
    public function hitungLaporan($kdPosyandu, $awal, $akhir)
    {
        $query = $this->db->query("SELECT COUNT(tahun) as jumlah FROM kegiatanposyandu WHERE kegiatanposyandu.kd_posyandu = $kdPosyandu and kegiatanposyandu.tanggal BETWEEN '$awal' AND '$akhir' ORDER BY no DESC");
        return $query->getResultArray();
    }

    public function getRange($kdposyandu, $awal, $akhir)
    {
        $range = $this->db->query("SELECT * FROM kegiatanposyandu
        WHERE kd_posyandu = $kdposyandu AND tanggal BETWEEN '$awal' AND '$akhir' ORDER BY no DESC");
        return $range->getResultArray();
    }

    public function getTotalCetakA($kdposyandu, $awal, $akhir)
    {
        $total = $this->db->query("SELECT 
        SUM(IF(kd_posyandu = '$kdposyandu', jml_ibu_hamil, 0)) AS totalibuhamil,
        SUM(IF(kd_posyandu = '$kdposyandu', jml_diperiksa, 0)) AS totaldpriksa,
        SUM(IF(kd_posyandu = '$kdposyandu', jml_fe_tab, 0)) AS totalfetab,
        SUM(IF(kd_posyandu = '$kdposyandu', jml_ibu_nyusu, 0)) AS totalibunyusu,
        SUM(IF(kd_posyandu = '$kdposyandu', jml_aseptor_kondom, 0)) AS totalkondom,
        SUM(IF(kd_posyandu = '$kdposyandu', jml_aseptor_pi, 0)) AS totalpi,
        SUM(IF(kd_posyandu = '$kdposyandu', jml_aseptor_implant, 0)) AS totalimplant,
        SUM(IF(kd_posyandu = '$kdposyandu', jml_aseptor_mop, 0)) AS totalmop,
        SUM(IF(kd_posyandu = '$kdposyandu', jml_aseptor_mow, 0)) AS totalmow,
        SUM(IF(kd_posyandu = '$kdposyandu', jml_aseptor_iud, 0)) AS totaliud,
        SUM(IF(kd_posyandu = '$kdposyandu', jml_aseptor_suntik, 0)) AS totalsuntik,
        SUM(IF(kd_posyandu = '$kdposyandu', jml_aseptor_lain, 0)) AS totallain,
        SUM(IF(kd_posyandu = '$kdposyandu', jml_balita_s_timbangL, 0)) AS totalbltsL,
        SUM(IF(kd_posyandu = '$kdposyandu', jml_balita_s_timbangP, 0)) AS totalbltsP,
        SUM(IF(kd_posyandu = '$kdposyandu', jml_balita_kms_timbangL, 0)) AS totalbltkmsL,
        SUM(IF(kd_posyandu = '$kdposyandu', jml_balita_kms_timbangP, 0)) AS totalbltkmsP,
        SUM(IF(kd_posyandu = '$kdposyandu', jml_balita_d_timbangL, 0)) AS totalbltdL,
        SUM(IF(kd_posyandu = '$kdposyandu', jml_balita_d_timbangP, 0)) AS totalbltdP,
        SUM(IF(kd_posyandu = '$kdposyandu', jml_balita_naik_timbangL, 0)) AS totalbltNaikL,
        SUM(IF(kd_posyandu = '$kdposyandu', jml_balita_naik_timbangP, 0)) AS totalbltNaikP,
        SUM(IF(kd_posyandu = '$kdposyandu', jml_balita_vita_timbangL, 0)) AS totalbltvitaL,
        SUM(IF(kd_posyandu = '$kdposyandu', jml_balita_vita_timbangP, 0)) AS totalbltvitaP,
        SUM(IF(kd_posyandu = '$kdposyandu', jml_balita_pmt_timbangL, 0)) AS totalbltpmtL,
        SUM(IF(kd_posyandu = '$kdposyandu', jml_balita_pmt_timbangP, 0)) AS totalbltpmtP,
        SUM(IF(kd_posyandu = '$kdposyandu', jml_imunisasi_ibu_I, 0)) AS totalibuI,
        SUM(IF(kd_posyandu = '$kdposyandu', jml_imunisasi_ibu_II, 0)) AS totalibuII FROM kegiatanposyandu WHERE tanggal BETWEEN '$awal' AND '$akhir' ORDER BY no DESC");
        return $total->getResultArray();
    }
}
