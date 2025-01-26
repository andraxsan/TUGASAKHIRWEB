<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class User extends Seeder
{
    public function run()
    {
        $data = [
            
            [
                'username' => 'Ahmad Riyadi',
                'password' => password_hash('learning', PASSWORD_DEFAULT),
                'level'    => 'siswa'
            ],
            
            [
                'username' => 'Siti Nurhaliza',
                'password' => password_hash('learning', PASSWORD_DEFAULT),
                'level'    => 'siswa'
            ],

            [
                'username' => 'Dr. Haris Maulana',
                'password' => password_hash('learning', PASSWORD_DEFAULT),
                'level'    => 'guru'
            ],
            
            [
                'username' => 'Ir. Lina Agustina',
                'password' => password_hash('learning', PASSWORD_DEFAULT),
                'level'    => 'guru'
            ],

            [
                'username' => 'Prof. Sutrisno',
                'password' => password_hash('learning', PASSWORD_DEFAULT),
                'level'    => 'guru'
            ],

            [
                'username' => 'Budi Santoso',
                'password' => password_hash('learning', PASSWORD_DEFAULT),
                'level'    => 'siswa'
            ],

            [
                'username' => 'Dewi Kartika',
                'password' => password_hash('learning', PASSWORD_DEFAULT),
                'level'    => 'siswa'
            ],

            [
                'username' => 'Drs. Wahyu Hidayat',
                'password' => password_hash('learning', PASSWORD_DEFAULT),
                'level'    => 'guru'
            ],

            [
                'username' => 'Andra',
                'password' => password_hash('learning', PASSWORD_DEFAULT),
                'level'    => 'admin'
            ],

            [
                'username' => 'Fahdi',
                'password' => password_hash('learning', PASSWORD_DEFAULT),
                'level'    => 'admin'
            ]
        ];

        // Menyisipkan data ke dalam tabel 'user'
        $this->db->table('user')->insertBatch($data);
    }
}