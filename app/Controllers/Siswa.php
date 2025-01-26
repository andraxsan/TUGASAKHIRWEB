<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Siswa extends BaseController
{
    public function index(): string
    {
        $pertModel = new \App\Models\PertemuanModel();
        $data['pertemuan'] = $pertModel->getPertemuan();
        return view('Siswa/beranda', $data);
    }
}
