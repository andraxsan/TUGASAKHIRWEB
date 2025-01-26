<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function beranda()
    {
        $guruModel = new \App\Models\GuruModel();
        $siswaModel = new \App\Models\SiswaModel();

        // Menghitung total data
        $data['totalGuru'] = $guruModel->countAll();
        $data['totalSiswa'] = $siswaModel->countAll();

        // Kirim data ke view
        return view('Admin/beranda', $data);
    }

    public function dataPengguna()
    {
        $ModelUser = new \App\Models\ModelUser();       // Memuat model
        $data['user'] = $ModelUser->getUser(); // Mengambil semua data pengguna


        return view('Admin/dataPengguna', $data);
    }

    public function tambahPengguna()
    {
        $ModelUser = new \App\Models\ModelUser();
        $data = [
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
            'level' => $this->request->getPost('level'),
        ];
        $ModelUser->insert($data);

        // Tambahkan flash data sukses
        session()->setFlashdata('success', 'Data pengguna berhasil ditambahkan!');
        return redirect()->to(base_url('Admin/dataPengguna'));
    }

    public function hapusPengguna()
    {
        $id = $this->request->getPost('id_user');

        if (!$id) {
            return redirect()->back()->with('error', 'ID pengguna tidak ditemukan.');
        }

        $ModelUser = new \App\Models\ModelUser();
        $deleted = $ModelUser->delete($id);

        if ($deleted) {
            return redirect()->to('Admin/dataPengguna')->with('success', 'Data pengguna berhasil dihapus.');
        } else {
            return redirect()->back()->with('error', 'Gagal menghapus data pengguna.');
        }
    }

    public function dataGuru()
    {
        $guruModel = new \App\Models\GuruModel();
        $data['guru'] = $guruModel->getGuru();

        return view('Admin/dataGuru', $data);
    }

    public function tambahGuru()
    {
        // Validasi input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nip' => 'required|is_unique[guru.nip]', // NIP harus unik
            'nama_guru' => 'required', // Nama guru wajib diisi
            'alamat' => 'required', // Alamat wajib diisi
            'email' => 'required|valid_email', // Email wajib dan harus valid
            'foto' => 'permit_empty|uploaded[foto]|max_size[foto,2048]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]', // Validasi foto
        ]);
        // Jika validasi gagal, kembali dengan pesan error
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Upload file foto jika ada
        $foto = $this->request->getFile('foto');
        $fotoName = null;
        if ($foto && $foto->isValid()) {
            $fotoName = $foto->getRandomName();
            $foto->move(FCPATH . 'uploads/guru', $fotoName); // Simpan ke direktori "uploads/guru"
        }

        // Data yang akan disimpan ke database
        $data = [
            'nip' => $this->request->getPost('nip'),
            'nama_guru' => $this->request->getPost('nama_guru'),
            'alamat' => $this->request->getPost('alamat'),
            'email' => $this->request->getPost('email'),
            'foto' => $fotoName,
        ];

        // Simpan ke database
        $guruModel = new \App\Models\GuruModel();
        if ($guruModel->insert($data)) {
            session()->setFlashdata('success', 'Data Guru berhasil ditambahkan!');
        } else {
            session()->setFlashdata('error', 'Gagal menambahkan Data Guru. Silakan coba lagi.');
        }

        return redirect()->to(base_url('Admin/dataGuru'));
    }

    public function getDetailGuru()
    {
        $guruModel = new \App\Models\GuruModel();
        $nip = $this->request->getPost('nip');

        if (!$nip) {
            return $this->response->setJSON(['error' => 'NIP tidak ditemukan']);
        }

        $guru = $this->$guruModel->getGuruByNIP($nip);

        if ($guru) {
            return $this->response->setJSON($guru);
        } else {
            return $this->response->setJSON(['error' => 'Data guru tidak ditemukan']);
        }
    }

    public function hapusGuru()
    {
        $nip = $this->request->getPost('nip');

        if (!$nip) {
            return redirect()->back()->with('error', 'NIP tidak ditemukan.');
        }

        $guruModel = new \App\Models\GuruModel();
        $deleted = $guruModel->delete($nip);

        if ($deleted) {
            return redirect()->to(base_url('Admin/dataGuru'))->with('success', 'Data guru berhasil dihapus.');
        } else {
            return redirect()->back()->with('error', 'Gagal menghapus data guru.');
        }
    }


    public function dataSiswa()
    {
        $siswaModel = new \App\Models\SiswaModel();
        $data['siswa'] = $siswaModel->getSiswa();
        return view('Admin/dataSiswa', $data);
    }

    public function tambahSiswa()
    {
        // Validasi input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nis' => 'required|is_unique[siswa.nis]', // NIS harus unik
            'nama_siswa' => 'required', // Nama guru wajib diisi
            'alamat' => 'required', // Alamat wajib diisi
            'email' => 'required|valid_email', // Email wajib dan harus valid
            'foto' => 'permit_empty|uploaded[foto]|max_size[foto,2048]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]', // Validasi foto
        ]);
        // Jika validasi gagal, kembali dengan pesan error
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Upload file foto jika ada
        $foto = $this->request->getFile('foto');
        $fotoName = null;
        if ($foto && $foto->isValid()) {
            $fotoName = $foto->getRandomName();
            $foto->move(FCPATH . 'uploads/siswa', $fotoName); // Simpan ke direktori "uploads/guru"
        }

        // Data yang akan disimpan ke database
        $data = [
            'nis' => $this->request->getPost('nis'),
            'nama_siswa' => $this->request->getPost('nama_siswa'),
            'alamat' => $this->request->getPost('alamat'),
            'email' => $this->request->getPost('email'),
            'foto' => $fotoName,
        ];

        // Simpan ke database
        $siswaModel = new \App\Models\SiswaModel();
        if ($siswaModel->insert($data)) {
            session()->setFlashdata('success', 'Data Siswa berhasil ditambahkan!');
        } else {
            session()->setFlashdata('error', 'Gagal menambahkan Data Guru. Silakan coba lagi.');
        }

        return redirect()->to(base_url('Admin/dataSiswa'));
    }


    public function getDetailSiswa()
    {
        $siswaModel = new \App\Models\SiswaModel();
        $nis = $this->request->getPost('nis');

        if (!$nis) {
            return $this->response->setJSON(['error' => 'NIS tidak ditemukan']);
        }

        $siswa = $this->$siswaModel->getGuruByNIS($nis);

        if ($siswa) {
            return $this->response->setJSON($siswa);
        } else {
            return $this->response->setJSON(['error' => 'Data siswa tidak ditemukan']);
        }
    }


    public function hapusSiswa()
    {
        $nis = $this->request->getPost('nis');

        if (!$nis) {
            return redirect()->back()->with('error', 'NIS tidak ditemukan.');
        }

        $siswaModel = new \App\Models\SiswaModel();
        $deleted = $siswaModel->delete($nis);

        if ($deleted) {
            return redirect()->to(base_url('Admin/dataSiswa'))->with('success', 'Data siswa berhasil dihapus.');
        } else {
            return redirect()->back()->with('error', 'Gagal menghapus data siswa.');
        }
    }



    public function dataMapel()
    {
        $mapelModel = new \App\Models\MapelModel();
        $data['mapel'] = $mapelModel->getMapel();

        return view('Admin/dataMapel', $data);
    }

    public function dataJurusan()
    {
        $jurusanModel = new \App\Models\JurusanModel();
        $data['jurusan'] = $jurusanModel->getJurusan();
        
        return view('Admin/dataJurusan', $data);
    }
}
