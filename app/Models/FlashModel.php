<?php

namespace App\Models;

use CodeIgniter\Model;

class FlashModel extends Model
{
    protected $table = 'flash';
    protected $primaryKey = 'id_flash';
    protected $allowedFields = ['nama'];

    public function getFlash($id = false)
    {
        return $this->first();
    }
}
