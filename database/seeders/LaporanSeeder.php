<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LaporanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('laporan_pemotongans')->insert([
            [
                'status_pemotongan' => 'pesanan anda sedang diproses',
                'tanggal_laporan' => '2024-01-01',
                'jumlah hewan' => '5',
                'keterangan_laporan' => 1,
                'id_penyembelih' => 3, // Sesuaikan dengan ID penyembelih pada tabel users
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'status_pemotongan' => 'pesanan dalam perjalanan',
                'tanggal_laporan' => '2024-01-02',
                'jumlah hewan' => '3',
                'keterangan_laporan' => 2,
                'id_penyembelih' => 3, // Sesuaikan dengan ID penyembelih pada tabel users
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'status_pemotongan' => 'pesanan selesai',
                'tanggal_laporan' => '2024-01-03',
                'jumlah hewan' => '8',
                'keterangan_laporan' => 3,
                'id_penyembelih' => 3, // Sesuaikan dengan ID penyembelih pada tabel users
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
