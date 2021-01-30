<?php

namespace App\Models;

use CodeIgniter\Model;

class DatapengunjungposyanduModel extends Model
{
    protected $table = 'datapengunjungposyandu';
    protected $useTimestamps = true;
    protected $allowedFields = ['kd_posyandu', 'tanggal', 'tahun', 'bulan', 'jml_pengunjung_sthun_baruL', 'jml_pengunjung_sthun_baruP', 'jml_pengunjung_sthun_lamaL', 'jml_pengunjung_sthun_lamaP', 'jml_pengunjung_limath_baruL', 'jml_pengunjung_limath_baruP', 'jml_pengunjung_limath_lamaL', 'jml_pengunjung_limath_lamaP', 'jml_pengunjung_wus', 'jml_pengunjung_pus_ibu', 'jml_pengunjung_hamil_ibu', 'jml_pengunjung_nyusu_ibu', 'jml_hadir_kader_l', 'jml_hadir_kader_p', 'jml_hadir_plkb_l', 'jml_hadir_plkb_p', 'jml_hadir_medis_l', 'jml_hadir_medis_p', 'jml_bayi_lahirL', 'jml_bayi_lahirP', 'jml_bayi_mnglL', 'jml_bayi_mnglP', 'keterangan'];

    public function getDatapengunjungposyandu($kdPosyandu, $th)
    {
        if ($th == null) {
            $query = $this->db->query("SELECT * FROM datapengunjungposyandu WHERE kd_posyandu = $kdPosyandu");
            return $query->getResultArray();
        } elseif ($kdPosyandu == null && $th == null) {
            $query = $this->db->query("SELECT * FROM datapengunjungposyandu");
            return $query->getResultArray();
        }

        $query = $this->db->query("SELECT * FROM datapengunjungposyandu WHERE kd_posyandu = $kdPosyandu and tahun = $th");
        return $query->getResultArray();
    }

    public function getDataNo($no)
    {
        return $this->where(['no' => $no])->first();
    }

    public function getTahun($kdPos)
    {
        $query = $this->db->query("SELECT DISTINCT tahun FROM datapengunjungposyandu WHERE kd_posyandu = $kdPos Order by tahun");
        return $query->getResultArray();
    }

    public function getTanggal($kdposyandu)
    {
        $query = $this->db->query("SELECT DISTINCT tanggal FROM datapengunjungposyandu WHERE kd_posyandu = $kdposyandu Order by tanggal");
        return $query->getResultArray();
    }

    public function getRange($kdposyandu, $awal, $akhir)
    {
        $range = $this->db->query("SELECT * FROM datapengunjungposyandu
        WHERE kd_posyandu = $kdposyandu AND tanggal BETWEEN '$awal' AND '$akhir' ORDER BY no DESC");
        return $range->getResultArray();
    }

    public function getTotal($kdposyandu, $tahun)
    {
        $total = $this->db->query("SELECT 
        SUM(IF(kd_posyandu = '$kdposyandu' AND tahun = $tahun, jml_pengunjung_sthun_baruL, 0)) AS totalbarustL,
        SUM(IF(kd_posyandu = '$kdposyandu' AND tahun = $tahun, jml_pengunjung_sthun_baruP, 0)) AS totalbarustP,
        SUM(IF(kd_posyandu = '$kdposyandu' AND tahun = $tahun, jml_pengunjung_sthun_lamaL, 0)) AS totallamastL,
        SUM(IF(kd_posyandu = '$kdposyandu' AND tahun = $tahun, jml_pengunjung_sthun_lamaP, 0)) AS totallamastP,
        SUM(IF(kd_posyandu = '$kdposyandu' AND tahun = $tahun, jml_pengunjung_limath_baruL, 0)) AS totalbarulmL,
        SUM(IF(kd_posyandu = '$kdposyandu' AND tahun = $tahun, jml_pengunjung_limath_baruP, 0)) AS totalbarulmP,
        SUM(IF(kd_posyandu = '$kdposyandu' AND tahun = $tahun, jml_pengunjung_limath_lamaL, 0)) AS totallamalmL,
        SUM(IF(kd_posyandu = '$kdposyandu' AND tahun = $tahun, jml_pengunjung_limath_lamaP, 0)) AS totallamalmP,
        SUM(IF(kd_posyandu = '$kdposyandu' AND tahun = $tahun, jml_pengunjung_wus, 0)) AS totalwus,
        SUM(IF(kd_posyandu = '$kdposyandu' AND tahun = $tahun, jml_pengunjung_pus_ibu, 0)) AS totalpus,
        SUM(IF(kd_posyandu = '$kdposyandu' AND tahun = $tahun, jml_pengunjung_hamil_ibu, 0)) AS totalhamil,
        SUM(IF(kd_posyandu = '$kdposyandu' AND tahun = $tahun, jml_pengunjung_nyusu_ibu, 0)) AS totalnyusu,
        SUM(IF(kd_posyandu = '$kdposyandu' AND tahun = $tahun, jml_hadir_kader_l, 0)) AS totalkaderL,
        SUM(IF(kd_posyandu = '$kdposyandu' AND tahun = $tahun, jml_hadir_kader_p, 0)) AS totalkaderP,
        SUM(IF(kd_posyandu = '$kdposyandu' AND tahun = $tahun, jml_hadir_plkb_l, 0)) AS totalplkbL,
        SUM(IF(kd_posyandu = '$kdposyandu' AND tahun = $tahun, jml_hadir_plkb_p, 0)) AS totalplkbP,
        SUM(IF(kd_posyandu = '$kdposyandu' AND tahun = $tahun, jml_hadir_medis_l, 0)) AS totalmedisL,
        SUM(IF(kd_posyandu = '$kdposyandu' AND tahun = $tahun, jml_hadir_medis_p, 0)) AS totalmedisP,
        SUM(IF(kd_posyandu = '$kdposyandu' AND tahun = $tahun, jml_bayi_lahirL, 0)) AS totallahirL,
        SUM(IF(kd_posyandu = '$kdposyandu' AND tahun = $tahun, jml_bayi_lahirP, 0)) AS totallahirP,
        SUM(IF(kd_posyandu = '$kdposyandu' AND tahun = $tahun, jml_bayi_mnglL, 0)) AS totalmnglL,
        SUM(IF(kd_posyandu = '$kdposyandu' AND tahun = $tahun, jml_bayi_mnglP, 0)) AS totalmnglP
        FROM datapengunjungposyandu");
        return $total->getResultArray();
    }

    public function getTotalCetak($kdposyandu, $awal, $akhir)
    {
        $total = $this->db->query("SELECT 
        SUM(IF(kd_posyandu = '$kdposyandu', jml_pengunjung_sthun_baruL, 0)) AS totalbarustL,
        SUM(IF(kd_posyandu = '$kdposyandu', jml_pengunjung_sthun_baruP, 0)) AS totalbarustP,
        SUM(IF(kd_posyandu = '$kdposyandu', jml_pengunjung_sthun_lamaL, 0)) AS totallamastL,
        SUM(IF(kd_posyandu = '$kdposyandu', jml_pengunjung_sthun_lamaP, 0)) AS totallamastP,
        SUM(IF(kd_posyandu = '$kdposyandu', jml_pengunjung_limath_baruL, 0)) AS totalbarulmL,
        SUM(IF(kd_posyandu = '$kdposyandu', jml_pengunjung_limath_baruP, 0)) AS totalbarulmP,
        SUM(IF(kd_posyandu = '$kdposyandu', jml_pengunjung_limath_lamaL, 0)) AS totallamalmL,
        SUM(IF(kd_posyandu = '$kdposyandu', jml_pengunjung_limath_lamaP, 0)) AS totallamalmP,
        SUM(IF(kd_posyandu = '$kdposyandu', jml_pengunjung_wus, 0)) AS totalwus,
        SUM(IF(kd_posyandu = '$kdposyandu', jml_pengunjung_pus_ibu, 0)) AS totalpus,
        SUM(IF(kd_posyandu = '$kdposyandu', jml_pengunjung_hamil_ibu, 0)) AS totalhamil,
        SUM(IF(kd_posyandu = '$kdposyandu', jml_pengunjung_nyusu_ibu, 0)) AS totalnyusu,
        SUM(IF(kd_posyandu = '$kdposyandu', jml_hadir_kader_l, 0)) AS totalkaderL,
        SUM(IF(kd_posyandu = '$kdposyandu', jml_hadir_kader_p, 0)) AS totalkaderP,
        SUM(IF(kd_posyandu = '$kdposyandu', jml_hadir_plkb_l, 0)) AS totalplkbL,
        SUM(IF(kd_posyandu = '$kdposyandu', jml_hadir_plkb_p, 0)) AS totalplkbP,
        SUM(IF(kd_posyandu = '$kdposyandu', jml_hadir_medis_l, 0)) AS totalmedisL,
        SUM(IF(kd_posyandu = '$kdposyandu', jml_hadir_medis_p, 0)) AS totalmedisP,
        SUM(IF(kd_posyandu = '$kdposyandu', jml_bayi_lahirL, 0)) AS totallahirL,
        SUM(IF(kd_posyandu = '$kdposyandu', jml_bayi_lahirP, 0)) AS totallahirP,
        SUM(IF(kd_posyandu = '$kdposyandu', jml_bayi_mnglL, 0)) AS totalmnglL,
        SUM(IF(kd_posyandu = '$kdposyandu', jml_bayi_mnglP, 0)) AS totalmnglP
        FROM datapengunjungposyandu WHERE tanggal BETWEEN '$awal' AND '$akhir' ORDER BY no DESC");
        return $total->getResultArray();
    }
}
