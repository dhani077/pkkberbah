<?php

namespace App\Models;

use CodeIgniter\Model;

class BukuinvenModel extends Model
{
    protected $table = 'bukuinventaris';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama_brg', 'asal_brg', 'tgl_terima_beli', 'jumlah', 'tempat_simpan', 'kondisi_brg', 'foto', 'keterangan'];

    public function getBukuinven($num = false)
    {
        if ($num == false) {
            return $this->findAll();
        }

        return $this->where(['no' => $num])->first();
    }

    public function cariBukuinven($keywords)
    {
        return $this->table('bukuinventaris')->like('nama_brg', $keywords)->findAll();
    }

    public function getTanggal()
    {
        $query = $this->db->query("SELECT DISTINCT tgl_terima_beli FROM bukuinventaris Order by tgl_terima_beli");
        return $query->getResultArray();
    }

    public function getRange($awal, $akhir)
    {
        $range = $this->db->query("SELECT * FROM bukuinventaris
        WHERE tgl_terima_beli BETWEEN '$awal' AND '$akhir' ORDER BY no DESC");
        return $range->getResultArray();
    }
}
