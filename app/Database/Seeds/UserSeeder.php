<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;


class UserSeeder extends Seeder
{
    public function run()
    {
        $password = 'Test1234.';
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $data = [
            'name' => 'leejiaqi',
            'email' => 'leejiaqi0415@gmail.com',
            'password' => $hashedPassword,
        ];

        $this->db->table('users')->insert($data);
    }
}