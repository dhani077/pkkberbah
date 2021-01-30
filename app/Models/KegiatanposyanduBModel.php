<?php

namespace App\Models;

use CodeIgniter\Model;

class KegiatanposyanduBModel extends Model
{
    protected $table = 'kegiatanposyandu2';
    protected $useTimestamps = true;
    protected $allowedFields = ['no', 'kd_posyandu', 'tanggal', 'tahun', 'jml_imunbayi_bcgl', 'jml_imunbayi_bcgp', 'jml_imunbayi_dpt_IL', 'jml_imunbayi_dpt_IP', 'jml_imunbayi_dpt_IIL', 'jml_imunbayi_dpt_IIP', 'jml_imunbayi_dpt_IIIL', 'jml_imunbayi_dpt_IIIP', 'jml_imunbayi_polio_IL', 'jml_imunbayi_polio_IP', 'jml_imunbayi_polio_IIL', 'jml_imunbayi_polio_IIP', 'jml_imunbayi_polio_IIIL', 'jml_imunbayi_polio_IIIP', 'jml_imunbayi_polio_IVL', 'jml_imunbayi_polio_IVP', 'jml_imunbayi_campakL', 'jml_imunbayi_campakP', 'jml_imunbayi_hepat_IL', 'jml_imunbayi_hepat_IP', 'jml_imunbayi_hepat_IIL', 'jml_imunbayi_hepat_IIP', 'jml_imunbayi_hepat_IIIL', 'jml_imunbayi_hepat_IIIP', 'jml_bltdiare_jmL', 'jml_bltdiare_jmP', 'jml_bltdiare_oralitL', 'jml_bltdiare_oralitP', 'foto', 'Keterangan'];

    public function getKegiatanB($num = false)
    {
        if ($num == false) {
            return $this->db->table('kegiatanposyandu')
                ->join('posyandu', 'kegiatanposyandu.kd_posyandu=posyandu.kd_posyandu')
                ->get()->getResultArray();
        }

        return $this->where(['no' => $num])->findAll;
    }
    public function getEditB($num = false)
    {

        return $this->where(['no' => $num])->first();
    }
    public function getWhereB($num, $th)
    {
        $query = $this->db->query("SELECT * FROM kegiatanposyandu2 JOIN kegiatanposyandu ON kegiatanposyandu2.no = kegiatanposyandu.no WHERE kegiatanposyandu2.kd_posyandu = $num and kegiatanposyandu2.tahun = $th");
        return $query->getResultArray();
    }

    public function getKegiatanposyanduLimit()
    {
        $query = $this->db->query("SELECT * FROM kegiatanposyandu JOIN kegiatanposyandu2 ON kegiatanposyandu2.no = kegiatanposyandu.no ORDER BY kegiatanposyandu2.no DESC LIMIT 3");
        return $query->getResultArray();
    }

    public function getTotalB($kdposyandu, $tahun)
    {
        $total = $this->db->query("SELECT SUM(IF(kd_posyandu = '$kdposyandu' AND tahun = $tahun, jml_imunbayi_bcgl, 0)) AS totalbcgL,
        SUM(IF(kd_posyandu = '$kdposyandu' AND tahun = $tahun, jml_imunbayi_bcgp, 0)) AS totalbcgP,
        SUM(IF(kd_posyandu = '$kdposyandu' AND tahun = $tahun, jml_imunbayi_dpt_IL, 0)) AS totaldptIL,
        SUM(IF(kd_posyandu = '$kdposyandu' AND tahun = $tahun, jml_imunbayi_dpt_IP, 0)) AS totaldptIP,
        SUM(IF(kd_posyandu = '$kdposyandu' AND tahun = $tahun, jml_imunbayi_dpt_IIL, 0)) AS totaldptIIL,
        SUM(IF(kd_posyandu = '$kdposyandu' AND tahun = $tahun, jml_imunbayi_dpt_IIP, 0)) AS totaldptIIP,
        SUM(IF(kd_posyandu = '$kdposyandu' AND tahun = $tahun, jml_imunbayi_dpt_IIIL, 0)) AS totaldptIIIL,
        SUM(IF(kd_posyandu = '$kdposyandu' AND tahun = $tahun, jml_imunbayi_dpt_IIIP, 0)) AS totaldptIIIP,
        SUM(IF(kd_posyandu = '$kdposyandu' AND tahun = $tahun, jml_imunbayi_polio_IL, 0)) AS totalpolioIL,
        SUM(IF(kd_posyandu = '$kdposyandu' AND tahun = $tahun, jml_imunbayi_polio_IP, 0)) AS totalpolioIP,
        SUM(IF(kd_posyandu = '$kdposyandu' AND tahun = $tahun, jml_imunbayi_polio_IIL, 0)) AS totalpolioIIL,
        SUM(IF(kd_posyandu = '$kdposyandu' AND tahun = $tahun, jml_imunbayi_polio_IIP, 0)) AS totalpolioIIP,
        SUM(IF(kd_posyandu = '$kdposyandu' AND tahun = $tahun, jml_imunbayi_polio_IIIL, 0)) AS totalpolioIIIL,
        SUM(IF(kd_posyandu = '$kdposyandu' AND tahun = $tahun, jml_imunbayi_polio_IIIP, 0)) AS totalpolioIIIP,
        SUM(IF(kd_posyandu = '$kdposyandu' AND tahun = $tahun, jml_imunbayi_polio_IVL, 0)) AS totalpolioIVL,
        SUM(IF(kd_posyandu = '$kdposyandu' AND tahun = $tahun, jml_imunbayi_polio_IVP, 0)) AS totalpolioIVP,
        SUM(IF(kd_posyandu = '$kdposyandu' AND tahun = $tahun, jml_imunbayi_campakL, 0)) AS totalcampakL,
        SUM(IF(kd_posyandu = '$kdposyandu' AND tahun = $tahun, jml_imunbayi_campakP, 0)) AS totalcampakP,
        SUM(IF(kd_posyandu = '$kdposyandu' AND tahun = $tahun, jml_imunbayi_hepat_IL, 0)) AS totalhepatIL,
        SUM(IF(kd_posyandu = '$kdposyandu' AND tahun = $tahun, jml_imunbayi_hepat_IP, 0)) AS totalhepatIP,
        SUM(IF(kd_posyandu = '$kdposyandu' AND tahun = $tahun, jml_imunbayi_hepat_IIL, 0)) AS totalhepatIIL,
        SUM(IF(kd_posyandu = '$kdposyandu' AND tahun = $tahun, jml_imunbayi_hepat_IIP, 0)) AS totalhepatIIP,
        SUM(IF(kd_posyandu = '$kdposyandu' AND tahun = $tahun, jml_imunbayi_hepat_IIIL, 0)) AS totalhepatIIIL,
        SUM(IF(kd_posyandu = '$kdposyandu' AND tahun = $tahun, jml_imunbayi_hepat_IIIP, 0)) AS totalhepatIIIP,
        SUM(IF(kd_posyandu = '$kdposyandu' AND tahun = $tahun, jml_bltdiare_jmL, 0)) AS totaldiareL,
        SUM(IF(kd_posyandu = '$kdposyandu' AND tahun = $tahun, jml_bltdiare_jmP, 0)) AS totaldiareP,
        SUM(IF(kd_posyandu = '$kdposyandu' AND tahun = $tahun, jml_bltdiare_oralitL, 0)) AS totaloralitL,
        SUM(IF(kd_posyandu = '$kdposyandu' AND tahun = $tahun, jml_bltdiare_oralitP, 0)) AS totaloralitP
        FROM kegiatanposyandu2");
        return $total->getResultArray();
    }

    public function getRange($kdposyandu, $awal, $akhir)
    {
        $range = $this->db->query("SELECT * FROM kegiatanposyandu2
        WHERE kd_posyandu = $kdposyandu AND tanggal BETWEEN '$awal' AND '$akhir' ORDER BY no DESC");
        return $range->getResultArray();
    }

    public function getTotalCetakB($kdposyandu, $awal, $akhir)
    {
        $total = $this->db->query("SELECT 
        SUM(IF(kd_posyandu = '$kdposyandu', jml_imunbayi_bcgl, 0)) AS totalbcgL,
        SUM(IF(kd_posyandu = '$kdposyandu', jml_imunbayi_bcgp, 0)) AS totalbcgP,
        SUM(IF(kd_posyandu = '$kdposyandu', jml_imunbayi_dpt_IL, 0)) AS totaldptIL,
        SUM(IF(kd_posyandu = '$kdposyandu', jml_imunbayi_dpt_IP, 0)) AS totaldptIP,
        SUM(IF(kd_posyandu = '$kdposyandu', jml_imunbayi_dpt_IIL, 0)) AS totaldptIIL,
        SUM(IF(kd_posyandu = '$kdposyandu', jml_imunbayi_dpt_IIP, 0)) AS totaldptIIP,
        SUM(IF(kd_posyandu = '$kdposyandu', jml_imunbayi_dpt_IIIL, 0)) AS totaldptIIIL,
        SUM(IF(kd_posyandu = '$kdposyandu', jml_imunbayi_dpt_IIIP, 0)) AS totaldptIIIP,
        SUM(IF(kd_posyandu = '$kdposyandu', jml_imunbayi_polio_IL, 0)) AS totalpolioIL,
        SUM(IF(kd_posyandu = '$kdposyandu', jml_imunbayi_polio_IP, 0)) AS totalpolioIP,
        SUM(IF(kd_posyandu = '$kdposyandu', jml_imunbayi_polio_IIL, 0)) AS totalpolioIIL,
        SUM(IF(kd_posyandu = '$kdposyandu', jml_imunbayi_polio_IIP, 0)) AS totalpolioIIP,
        SUM(IF(kd_posyandu = '$kdposyandu', jml_imunbayi_polio_IIIL, 0)) AS totalpolioIIIL,
        SUM(IF(kd_posyandu = '$kdposyandu', jml_imunbayi_polio_IIIP, 0)) AS totalpolioIIIP,
        SUM(IF(kd_posyandu = '$kdposyandu', jml_imunbayi_polio_IVL, 0)) AS totalpolioIVL,
        SUM(IF(kd_posyandu = '$kdposyandu', jml_imunbayi_polio_IVP, 0)) AS totalpolioIVP,
        SUM(IF(kd_posyandu = '$kdposyandu', jml_imunbayi_campakL, 0)) AS totalcampakL,
        SUM(IF(kd_posyandu = '$kdposyandu', jml_imunbayi_campakP, 0)) AS totalcampakP,
        SUM(IF(kd_posyandu = '$kdposyandu', jml_imunbayi_hepat_IL, 0)) AS totalhepatIL,
        SUM(IF(kd_posyandu = '$kdposyandu', jml_imunbayi_hepat_IP, 0)) AS totalhepatIP,
        SUM(IF(kd_posyandu = '$kdposyandu', jml_imunbayi_hepat_IIL, 0)) AS totalhepatIIL,
        SUM(IF(kd_posyandu = '$kdposyandu', jml_imunbayi_hepat_IIP, 0)) AS totalhepatIIP,
        SUM(IF(kd_posyandu = '$kdposyandu', jml_imunbayi_hepat_IIIL, 0)) AS totalhepatIIIL,
        SUM(IF(kd_posyandu = '$kdposyandu', jml_imunbayi_hepat_IIIP, 0)) AS totalhepatIIIP,
        SUM(IF(kd_posyandu = '$kdposyandu', jml_bltdiare_jmL, 0)) AS totaldiareL,
        SUM(IF(kd_posyandu = '$kdposyandu', jml_bltdiare_jmP, 0)) AS totaldiareP,
        SUM(IF(kd_posyandu = '$kdposyandu', jml_bltdiare_oralitL, 0)) AS totaloralitL,
        SUM(IF(kd_posyandu = '$kdposyandu', jml_bltdiare_oralitP, 0)) AS totaloralitP
        FROM kegiatanposyandu2 WHERE tanggal BETWEEN '$awal' AND '$akhir' ORDER BY no_keg DESC");
        return $total->getResultArray();
    }
}
