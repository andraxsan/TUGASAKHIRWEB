<?php

namespace App\Models;

use CodeIgniter\Model;

class SiswaModel extends Model
{
    protected $table = 'siswa';
    protected $primaryKey = 'nis';
    protected $allowedFields = ['nis', 'nama_siswa', 'alamat', 'email', 'foto'];
    protected $useTimestamps = false;

    public function getSiswa()
    {
        return $this->findAll();
    }

    public function getSiswaByNIS($nis)
    {
        return $this->where('nis', $nis)->first(); // Menggunakan Query Builder
    }
}