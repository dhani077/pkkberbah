<?php

namespace App\Models;

use CodeIgniter\Model;

class CatatanKegwargaModel extends Model
{
    protected $table = 'catatandatakegiatanwarga';
    protected $useTimestamps = true;
    protected $allowedFields = ['tanggal', 'tahun', 'nama_kelurahan', 'jml_dusun', 'jml_rw', 'jml_rt', 'jml_dasawisma', 'jml_krt', 'jml_kk', 'jml_angt_keluarga_totL', 'jml_angt_keluarga_totP', 'jml_angt_keluarga_balitaL', 'jml_angt_keluarga_balitaP', 'jml_angt_keluarga_pus', 'jml_angt_keluarga_wus', 'jml_angt_keluarga_ibuhml', 'jml_angt_keluarga_ibunyusu', 'jml_angt_keluarga_lansia', 'jml_angt_keluarga_butaL', 'jml_angt_keluarga_butaP', 'jml_rmh_sehat', 'jml_rmh_krgsehat', 'jml_rmh_sampah', 'jml_rmh_spal', 'jml_rmh_p4k', 'jml_airkel_pdam', 'jml_airkel_sumur', 'jml_airkel_sungai', 'jml_airkel_lain', 'jml_jamban_kel', 'jml_mknpokok_beras', 'jml_mknpokok_nonberas', 'jml_wrg_up2k', 'jml_wrg_mnfaat_tanah', 'jml_wrg_industrirt', 'jml_wrg_keslingk', 'keterangan'];

    public function getCatatanKegwarga($num = false)
    {
        if ($num == false) {
            return $this->findAll();
        }

        return $this->where(['no' => $num])->first();
    }

    public function getTahun()
    {
        $query = $this->db->query("SELECT DISTINCT tahun FROM catatandatakegiatanwarga WHERE tahun Order by tahun");
        return $query->getResultArray();
    }

    public function getData($tahun)
    {

        return $this->where(['tahun' => $tahun])->findAll();
    }
    public function getWilayah()
    {
        return $this->db->table('wilayah')->get()->getResultArray();
    }

    public function getTanggal()
    {
        $query = $this->db->query("SELECT DISTINCT tanggal FROM catatandatakegiatanwarga Order by tanggal");
        return $query->getResultArray();
    }

    public function getRange($awal, $akhir)
    {
        $range = $this->db->query("SELECT * FROM catatandatakegiatanwarga
        WHERE tanggal BETWEEN '$awal' AND '$akhir' ORDER BY no DESC");
        return $range->getResultArray();
    }

    public function getTotal($th)
    {
        $total = $this->db->query("SELECT
        SUM(IF(tahun = $th, jml_dusun, 0)) AS totaldusun,
        SUM(IF(tahun = $th, jml_rw, 0)) AS totalrw,
        SUM(IF(tahun = $th, jml_rt, 0)) AS totalrt,
        SUM(IF(tahun = $th, jml_dasawisma, 0)) AS totaldasawisma,
        SUM(IF(tahun = $th, jml_krt, 0)) AS totalkrt,
        SUM(IF(tahun = $th, jml_kk, 0)) AS totalkk,
        SUM(IF(tahun = $th, jml_angt_keluarga_totL, 0)) AS totallaki,
        SUM(IF(tahun = $th, jml_angt_keluarga_totP, 0)) AS totalperempuan,
        SUM(IF(tahun = $th, jml_angt_keluarga_balitaL, 0)) AS totalbalitaL,
        SUM(IF(tahun = $th, jml_angt_keluarga_balitaP, 0)) AS totalbalitaP,
        SUM(IF(tahun = $th, jml_angt_keluarga_pus, 0)) AS totalpus,
        SUM(IF(tahun = $th, jml_angt_keluarga_wus, 0)) AS totalwus,
        SUM(IF(tahun = $th, jml_angt_keluarga_ibuhml, 0)) AS totalibuhml,
        SUM(IF(tahun = $th, jml_angt_keluarga_ibunyusu, 0)) AS totalibunyusu,
        SUM(IF(tahun = $th, jml_angt_keluarga_lansia, 0)) AS totallansia,
        SUM(IF(tahun = $th, jml_angt_keluarga_butaL, 0)) AS totalbutaL,
        SUM(IF(tahun = $th, jml_angt_keluarga_butaP, 0)) AS totalbutaP,
        SUM(IF(tahun = $th, jml_rmh_sehat, 0)) AS totalrmhsehat,
        SUM(IF(tahun = $th, jml_rmh_krgsehat, 0)) AS totalrmhkrgsehat,
        SUM(IF(tahun = $th, jml_rmh_sampah, 0)) AS totalrmhsampah,
        SUM(IF(tahun = $th, jml_rmh_spal, 0)) AS totalrmhspal,
        SUM(IF(tahun = $th, jml_rmh_p4k, 0)) AS totalrmhp4k,
        SUM(IF(tahun = $th, jml_airkel_pdam, 0)) AS totalpdam,
        SUM(IF(tahun = $th, jml_airkel_sumur, 0)) AS totalsumur,
        SUM(IF(tahun = $th, jml_airkel_sungai, 0)) AS totalsungai,
        SUM(IF(tahun = $th, jml_airkel_lain, 0)) AS totallain,
        SUM(IF(tahun = $th, jml_jamban_kel, 0)) AS totaljamban,
        SUM(IF(tahun = $th, jml_mknpokok_beras, 0)) AS totalberas,
        SUM(IF(tahun = $th, jml_mknpokok_nonberas, 0)) AS totalnonberas,
        SUM(IF(tahun = $th, jml_wrg_up2k, 0)) AS totalup2k,
        SUM(IF(tahun = $th, jml_wrg_mnfaat_tanah, 0)) AS totaltanah,
        SUM(IF(tahun = $th, jml_wrg_industrirt, 0)) AS totalindustri,
        SUM(IF(tahun = $th, jml_wrg_keslingk, 0)) AS totalkeslingk
        FROM catatandatakegiatanwarga");
        return $total->getResultArray();
    }

    public function getTotalCetak($awal, $akhir)
    {
        $total = $this->db->query("SELECT
        SUM(jml_dusun) AS totaldusun,
        SUM(jml_rw) AS totalrw,
        SUM(jml_rt) AS totalrt,
        SUM(jml_dasawisma) AS totaldasawisma,
        SUM(jml_krt) AS totalkrt,
        SUM(jml_kk) AS totalkk,
        SUM(jml_angt_keluarga_totL) AS totallaki,
        SUM(jml_angt_keluarga_totP) AS totalperempuan,
        SUM(jml_angt_keluarga_balitaL) AS totalbalitaL,
        SUM(jml_angt_keluarga_balitaP) AS totalbalitaP,
        SUM(jml_angt_keluarga_pus) AS totalpus,
        SUM(jml_angt_keluarga_wus) AS totalwus,
        SUM(jml_angt_keluarga_ibuhml) AS totalibuhml,
        SUM(jml_angt_keluarga_ibunyusu) AS totalibunyusu,
        SUM(jml_angt_keluarga_lansia) AS totallansia,
        SUM(jml_angt_keluarga_butaL) AS totalbutaL,
        SUM(jml_angt_keluarga_butaP) AS totalbutaP,
        SUM(jml_rmh_sehat) AS totalrmhsehat,
        SUM(jml_rmh_krgsehat) AS totalrmhkrgsehat,
        SUM(jml_rmh_sampah) AS totalrmhsampah,
        SUM(jml_rmh_spal) AS totalrmhspal,
        SUM(jml_rmh_p4k) AS totalrmhp4k,
        SUM(jml_airkel_pdam) AS totalpdam,
        SUM(jml_airkel_sumur) AS totalsumur,
        SUM(jml_airkel_sungai) AS totalsungai,
        SUM(jml_airkel_lain) AS totallain,
        SUM(jml_jamban_kel) AS totaljamban,
        SUM(jml_mknpokok_beras) AS totalberas,
        SUM(jml_mknpokok_nonberas) AS totalnonberas,
        SUM(jml_wrg_up2k) AS totalup2k,
        SUM(jml_wrg_mnfaat_tanah) AS totaltanah,
        SUM(jml_wrg_industrirt) AS totalindustri,
        SUM(jml_wrg_keslingk) AS totalkeslingk
        FROM catatandatakegiatanwarga WHERE tanggal BETWEEN '$awal' AND '$akhir' ORDER BY no DESC");
        return $total->getResultArray();
    }
}
