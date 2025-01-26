<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Auth extends BaseController
{
    public function index()
    {
        return view('login');
    }

    public function autentikasi()
    {
        $ModelLogin = new \App\Models\ModelUser();

        if ($this->request->getMethod() === 'POST') {
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            if (!$dataLogin = $ModelLogin->where('username', $username)->first()) {
                $err = "Username tidak terdaftar";
            }

            if (empty($err)) {
                // Validasi password menggunakan password_hash
                $dataLogin = $ModelLogin->where('username', $username)->first();
                if (!password_verify($password, $dataLogin['password'])) {
                    $err = "Password tidak sesuai";
                }
            }

            if (empty($err)) {
                // Menyimpan data sesi setelah berhasil login
                $dataSesi = [
                    'id_user' => $dataLogin['id_user'],
                    'username' => $dataLogin['username'],
                    'password' => $dataLogin['password'],
                    'level' => $dataLogin['level'],
                ];
                session()->set($dataSesi);

                // Redirect berdasarkan level pengguna menggunakan switch case
                switch ($dataLogin['level']) {
                    case 'admin':
                        return redirect()->to('/Admin/beranda');
                    case 'guru':
                        return redirect()->to('/Guru/beranda');
                    case 'siswa':
                        return redirect()->to('/Siswa/beranda');
                    default:
                        // Jika level tidak dikenali, logout dan redirect ke halaman utama
                        session()->remove('level');
                        return redirect()->to('/')->with('error', 'Akses tidak valid');
                }
            }

            if (isset($err)) {
                // Menyimpan error dan username untuk feedback
                session()->setFlashdata('username', $username);
                session()->setFlashdata('error', $err);
                return redirect()->to('/');
            }
        }

        return redirect()->to('/');
    }

    public function logout()
    {
        // Menghapus semua data session
        session()->destroy();

        // Redirect ke halaman login atau halaman utama setelah logout
        return redirect()->to('/')->with('success', 'You have successfully logged out.');
    }
}
