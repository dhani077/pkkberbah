<?php

namespace App\Models;

use CodeIgniter\Model;

class BukukegiatanModel extends Model
{
    protected $table = 'bukukegiatan';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama', 'jabatan', 'tgl_kegiatan', 'tempat_kegiatan', 'foto', 'uraian_kegiatan'];

    public function getBukukegiatan($num = false)
    {
        if ($num == false) {
            return $this->findAll();
        }

        return $this->where(['no' => $num])->first();
    }

    public function cariBukukegiatan($keywords)
    {
        return $this->table('bukukegiatan')->like('nama', $keywords)->orLike('jabatan', $keywords)->findAll();
    }

    public function getTanggal()
    {
        $query = $this->db->query("SELECT DISTINCT tgl_kegiatan FROM bukukegiatan Order by tgl_kegiatan");
        return $query->getResultArray();
    }

    public function getRange($awal, $akhir)
    {
        $range = $this->db->query("SELECT * FROM bukukegiatan
        WHERE tgl_kegiatan BETWEEN '$awal' AND '$akhir' ORDER BY no DESC");
        return $range->getResultArray();
    }
}
