<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Guru extends BaseController
{
    public function index(): string
    {
        $pertModel = new \App\Models\PertemuanModel();
        $data['pertemuan'] = $pertModel->getPertemuan();

        return view('Guru/beranda', $data);
    }

}
