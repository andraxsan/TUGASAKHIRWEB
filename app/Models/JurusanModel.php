<?php

namespace App\Models;

use CodeIgniter\Model;

class JurusanModel extends Model
{
    protected $table = 'jurusan';
    protected $primaryKey = 'id_jurusan';
    protected $allowedFields = ['id_jurusan', 'nama_jurusan'];
    protected $useTimestamps = false;

    public function getJurusan()
    {
        return $this->findAll();
    }

    public function getGuruByJURUSAN($idjurusan)
    {
        return $this->where('id_jurusan', $idjurusan)->first(); // Menggunakan Query Builder
    }
}