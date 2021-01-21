<?php

namespace App\Models;

use CodeIgniter\Model;

class DatapelatihankaderModel extends Model
{
    protected $table = 'datapelatihankader';
    protected $useTimestamps = true;
    protected $allowedFields = ['no_reg', 'nama_pelatihan', 'kriteria_kader', 'tanggal', 'penyelenggara', 'keterangan'];

    public function getPelatihan($num = false)
    {
        if ($num == false) {
            return $this->db->table('pelatihankader')
                ->join('wilayah', 'pelatihankader.kd_wilayah=wilayah.kd_wilayah')->join('datapelatihankader', 'pelatihankader.no_reg=datapelatihankader.no_reg')
                ->get()->getResultArray();
        }
        return $this->where(['no_reg' => $num])->findAll();
    }

    public function getData($num = false)
    {
        if ($num == false) {
            $this->db->table('datapelatihankader')
                ->join('pelatihankader', 'pelatihankader.no_reg=datapelatihankader.no_reg')
                ->get()->getResultArray();
            return $this->findAll();
        }

        return $this->where(['no' => $num])->first();
    }

    public function getCek($num)
    {
        return $this->where(['no_reg' => $num])->first();
    }
}
