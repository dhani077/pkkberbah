<?php

namespace App\Models;

use CodeIgniter\Model;

class PokjaIIIModel extends Model
{
    protected $table = 'pokja3';
    protected $useTimestamps = true;
    protected $allowedFields = ['tanggal', 'tahun', 'kd_wilayah', 'jml_kader_pangan', 'jml_kader_sandang', 'jml_kader_tatart', 'jml_mknpokok_beras', 'jml_mknpokok_nonberas', 'jml_pmnfaatn_ternak', 'jml_pmnfaatn_ikan', 'jml_pmnfaatn_warung', 'jml_pmnfaatn_lumbung', 'jml_pmnfaatn_toga', 'jml_pmnfaatn_tnmkeras', 'jml_ind_pangan', 'jml_ind_sandang', 'jml_ind_jasa', 'jml_rmh_layak', 'jml_rmh_tidaklayak', 'keterangan'];
    public function getPokjaIII($num = false)
    {
        if ($num == false) {
            return $this->findAll();
        }

        return $this->where(['no' => $num])->first();
    }

    public function getTanggal()
    {
        $query = $this->db->query("SELECT DISTINCT tanggal FROM pokja3 Order by tanggal");
        return $query->getResultArray();
    }

    public function getTahun()
    {
        $query = $this->db->query("SELECT DISTINCT tahun FROM pokja3 Order by tahun");
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
            $query = $this->db->query("SELECT * FROM pokja3 WHERE tahun = $th");
            return $query->getResultArray();
        }
    }

    public function getRange($awal, $akhir)
    {
        $range = $this->db->query("SELECT * FROM pokja3
        WHERE tanggal BETWEEN '$awal' AND '$akhir' ORDER BY no DESC");
        return $range->getResultArray();
    }

    public function getTotal($th)
    {
        $total = $this->db->query("SELECT
        SUM(IF(tahun = $th, jml_kader_pangan, 0)) AS totalkaderpangan,
        SUM(IF(tahun = $th, jml_kader_sandang, 0)) AS totalkadersandang,
        SUM(IF(tahun = $th, jml_kader_tatart, 0)) AS totalkadertatart,
        SUM(IF(tahun = $th, jml_mknpokok_beras, 0)) AS totalmknberas,
        SUM(IF(tahun = $th, jml_mknpokok_nonberas, 0)) AS totalmknnonberas,
        SUM(IF(tahun = $th, jml_pmnfaatn_ternak, 0)) AS totalternak,
        SUM(IF(tahun = $th, jml_pmnfaatn_ikan, 0)) AS totalikan,
        SUM(IF(tahun = $th, jml_pmnfaatn_warung, 0)) AS totalwarung,
        SUM(IF(tahun = $th, jml_pmnfaatn_lumbung, 0)) AS totallumbung,
        SUM(IF(tahun = $th, jml_pmnfaatn_toga, 0)) AS totaltoga,
        SUM(IF(tahun = $th, jml_pmnfaatn_tnmkeras, 0)) AS totaltnmkeras,
        SUM(IF(tahun = $th, jml_ind_pangan, 0)) AS totalindpangan,
        SUM(IF(tahun = $th, jml_ind_sandang, 0)) AS totalindsandang,
        SUM(IF(tahun = $th, jml_ind_jasa, 0)) AS totalindjasa,
        SUM(IF(tahun = $th, jml_rmh_layak, 0)) AS totalrmhlayak,
        SUM(IF(tahun = $th, jml_rmh_tidaklayak, 0)) AS totalrmhtdklayak FROM pokja3");
        return $total->getResultArray();
    }

    public function getTotalCetak($awal, $akhir)
    {
        $total = $this->db->query("SELECT
        SUM(jml_kader_pangan) AS totalkaderpangan,
        SUM(jml_kader_sandang) AS totalkadersandang,
        SUM(jml_kader_tatart) AS totalkadertatart,
        SUM(jml_mknpokok_beras) AS totalmknberas,
        SUM(jml_mknpokok_nonberas) AS totalmknnonberas,
        SUM(jml_pmnfaatn_ternak) AS totalternak,
        SUM(jml_pmnfaatn_ikan) AS totalikan,
        SUM(jml_pmnfaatn_warung) AS totalwarung,
        SUM(jml_pmnfaatn_lumbung) AS totallumbung,
        SUM(jml_pmnfaatn_toga) AS totaltoga,
        SUM(jml_pmnfaatn_tnmkeras) AS totaltnmkeras,
        SUM(jml_ind_pangan) AS totalindpangan,
        SUM(jml_ind_sandang) AS totalindsandang,
        SUM(jml_ind_jasa) AS totalindjasa,
        SUM(jml_rmh_layak) AS totalrmhlayak,
        SUM(jml_rmh_tidaklayak) AS totalrmhtdklayak FROM pokja3 WHERE tanggal BETWEEN '$awal' AND '$akhir' ORDER BY no DESC");
        return $total->getResultArray();
    }
}
