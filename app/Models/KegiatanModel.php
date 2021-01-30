<?php

namespace App\Models;

use CodeIgniter\Model;

class KegiatanModel extends Model
{
    protected $table = 'kegiatanlain';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama_kegiatan', 'tempat_pelaksanaan', 'tgl_pelaksanaan', 'foto', 'video', 'keterangan'];

    public function getKegiatan($kdKegiatan = false)
    {
        if ($kdKegiatan == false) {
            return $this->findAll();
        }
        return $this->where(['kd_kegiatan' => $kdKegiatan])->first();
    }

    public function getKegiatanLimit()
    {
        $query = $this->db->query("SELECT * FROM kegiatanlain ORDER BY kd_kegiatan DESC LIMIT 3");
        return $query->getResultArray();
    }
    public function cariKegiatanlain($keywords)
    {
        return $this->table('kegiatanlain')->like('nama_kegiatan', $keywords)->findAll();
    }

    public function getTanggal()
    {
        $query = $this->db->query("SELECT DISTINCT tgl_pelaksanaan FROM kegiatanlain Order by tgl_pelaksanaan");
        return $query->getResultArray();
    }

    public function getRange($awal, $akhir)
    {
        $range = $this->db->query("SELECT * FROM kegiatanlain
        WHERE tgl_pelaksanaan BETWEEN '$awal' AND '$akhir' ORDER BY kd_kegiatan DESC");
        return $range->getResultArray();
    }
}
