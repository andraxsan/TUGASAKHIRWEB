<?php

use CodeIgniter\Router\RouteCollection;

$routes->get('/', 'Auth::index');
$routes->get('logout', 'Auth::logout');
$routes->post('/autentikasi', 'Auth::autentikasi');

// Route Group untuk admin
$routes->group('Admin', ['filter' => 'level:admin'], function (RouteCollection $routes) {
    $routes->get('beranda', 'Admin::beranda');  // Menampilkan beranda
    $routes->get('dataPengguna', 'Admin::dataPengguna'); // Untuk halaman Data Pengguna
    $routes->post('tambahPengguna', 'Admin::tambahPengguna'); // Untuk memproses tambah data pengguna
    $routes->post('hapusPengguna', 'Admin::hapusPengguna');
    $routes->get('dataGuru', 'Admin::dataGuru');
    $routes->post('tambahGuru', 'Admin::tambahGuru'); // Untuk memproses tambah data pengguna
    $routes->post('hapusGuru', 'Admin::hapusGuru');
    $routes->get('dataSiswa', 'Admin::dataSiswa');
    $routes->post('tambahSiswa', 'Admin::tambahSiswa'); // Untuk memproses tambah data pengguna
    $routes->post('hapusSiswa', 'Admin::hapusSiswa');
    $routes->get('dataMapel', 'Admin::dataMapel');
    $routes->get('dataJurusan', 'Admin::dataJurusan');
});

// Route Group untuk guru
$routes->group('Guru', ['filter' => 'level:guru'], function (RouteCollection $routes) {
    $routes->get('beranda', 'Guru::index');  // Menampilkan daftar kursus
});

// Route Group untuk siswa
$routes->group('Siswa', ['filter' => 'level:siswa'], function (RouteCollection $routes) {
    $routes->get('beranda', 'Siswa::index');  // Menampilkan tugas siswa
});