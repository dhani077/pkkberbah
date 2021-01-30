<?php

namespace App\Models;

use CodeIgniter\Model;

class ProgramModel extends Model
{
    protected $table = 'programpkk';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama_program', 'penanggungjawab', 'keterangan'];

    public function getProgram($kdProgram = false)
    {
        if ($kdProgram == false) {
            return $this->findAll();
        }

        return $this->where(['kd_program' => $kdProgram])->first();
    }
}
