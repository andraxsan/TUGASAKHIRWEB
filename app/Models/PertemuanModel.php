<?php

namespace App\Models;

use CodeIgniter\Model;

class PertemuanModel extends Model
{
    protected $table = 'pertemuan';
    protected $primaryKey = 'id_pertemuan';
    protected $allowedFields = ['kode_mapel', 'judul_pertemuan', 'judul_pertemuan', 'materi'];
    protected $useTimestamps = false;

    public function getPertemuan()
    {
        return $this->findAll();
    }

    public function getPertemuanByIDP($idp)
    {
        return $this->where('pertemuan', $idp)->first(); // Menggunakan Query Builder
    }
}