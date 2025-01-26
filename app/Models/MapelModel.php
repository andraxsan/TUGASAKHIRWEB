<?php

namespace App\Models;

use CodeIgniter\Model;

class MapelModel extends Model
{
    protected $table = 'mapel';
    protected $primaryKey = 'kode_mapel';
    protected $allowedFields = ['kode_mapel', 'nama_mapel', 'id_jurusan', 'nip', 'tingkat', 'tahun', 'semester'];
    protected $useTimestamps = false;

    public function getMapel()
    {
        return $this->findAll();
    }

    public function getMapelByKDMAPEL($kdmapel)
    {
        return $this->where('mapel', $kdmapel)->first(); // Menggunakan Query Builder
    }
}