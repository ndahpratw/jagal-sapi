<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'nama' => 'Admin SapiKu',
                'email' => 'admin@sapiku.com',
                'password' => Hash::make('password123'),
                'alamat' => 'Jl. Raya Sangkapura No. 1',
                'no_telepon' => '081234567890',
                'jenis_kelamin' => 'laki-laki',
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Customer A',
                'email' => 'customer.a@gmail.com',
                'password' => Hash::make('password123'),
                'alamat' => 'Jl. Bunga Desa No. 10',
                'no_telepon' => '081234567891',
                'jenis_kelamin' => 'perempuan',
                'role' => 'customer',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Penyembelih B',
                'email' => 'penyembelih.b@gmail.com',
                'password' => Hash::make('password123'),
                'alamat' => 'Jl. Kebun Raya No. 5',
                'no_telepon' => '081234567892',
                'jenis_kelamin' => 'laki-laki',
                'role' => 'penyembelih',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
