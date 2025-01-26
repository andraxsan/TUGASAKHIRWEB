<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class LevelFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Ambil level yang diakses dari URL (misalnya '/admin', '/guru', '/siswa')
        $levelAccess = $arguments[0] ?? null;

        // Ambil level pengguna dari session
        $levelSession = session()->get('level');

        // Jika level session ada dan level yang diakses tidak sesuai dengan level session
        if ($levelSession && $levelAccess && $levelAccess !== $levelSession) {
            // Redirect ke halaman sesuai dengan level yang ada di session, dengan level di capitalize
            return redirect()->to("/" . ucfirst(strtolower($levelSession)) . "/dashboard");
        }

        // Jika levelAccess tidak ada, pastikan session sudah di-set dengan level yang benar
        if ($levelAccess && !$levelSession) {
            // Jika level yang diakses ada, set level ke session
            session()->set('level', $levelAccess);
        }

        // Jika level tidak ditemukan di URL atau session, arahkan ke halaman utama
        if (!$levelAccess && !$levelSession) {
            return redirect()->to('/')->with('error', 'Invalid access!');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Tidak ada proses tambahan setelah request dijalankan
    }
}