<?php

namespace App\Models;

use CodeIgniter\Model;

class GuruModel extends Model
{
    protected $table = 'guru';
    protected $primaryKey = 'nip';
    protected $allowedFields = ['nip', 'nama_guru', 'alamat', 'email', 'foto'];
    protected $useTimestamps = false;

    public function getGuru()
    {
        return $this->findAll();
    }

    public function getGuruByNIP($nip)
    {
        return $this->where('nip', $nip)->first(); // Menggunakan Query Builder
    }
}