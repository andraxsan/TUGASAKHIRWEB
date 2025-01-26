<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelUser extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id_user';
    protected $allowedFields = ['username', 'password', 'level'];
    protected $useTimestamps = false;

    public function getUsersByLevel($level)
    {
        return $this->where('level', $level)->findAll();
    }

    // Fungsi untuk mengambil semua data pengguna
    public function getUser()
    {
        return $this->findAll(); 
    }

}
