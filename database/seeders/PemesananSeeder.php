<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PemesananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pemesanans')->insert([
            [
                'status_pemesanan' => 'pesanan anda sedang diproses',
                'id_laporan' => null, // Sesuaikan jika ada laporan terkait
                'id_konsumen' => 2, // Sesuaikan dengan ID konsumen pada tabel users
                'id_produk' => 1, // Sesuaikan dengan ID produk pada tabel katalog_produks
                'tanggal_pemesanan' => '2024-01-01',
                'total_biaya' => 500000,
                'alamat' => 'Bawean',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'status_pemesanan' => 'pesanan selesai',
                'id_laporan' => 1, // Sesuaikan dengan ID laporan pada tabel laporan_pemotongans
                'id_konsumen' => 2, // Sesuaikan dengan ID konsumen pada tabel users
                'id_produk' => 2, // Sesuaikan dengan ID produk pada tabel katalog_produks
                'tanggal_pemesanan' => '2024-01-02',
                'total_biaya' => 2000000,
                'alamat' => 'Bawean',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'status_pemesanan' => 'pesananan dalam pengiriman',
                'id_laporan' => 2, // Sesuaikan dengan ID laporan pada tabel laporan_pemotongans
                'id_konsumen' => 3, // Sesuaikan dengan ID konsumen pada tabel users
                'id_produk' => 3, // Sesuaikan dengan ID produk pada tabel katalog_produks
                'tanggal_pemesanan' => '2024-01-03',
                'total_biaya' => 150000,
                'alamat' => 'Bawean',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
