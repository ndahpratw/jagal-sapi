<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('katalog_produks')->insert([
            [
                'nama_produk' => 'Pemotongan Sapi',
                'deskripsi' => 'Layanan pemotongan hewan sesuai syariat',
                'gambar' => 'pemotongan_hewan.jpg',
                // 'id_hewan' => 1, // Sesuaikan dengan ID dari tabel jenis_hewans
                'stok' => 10,
                'harga' => 500000,
                'satuan' => "ekor",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_produk' => 'Penjualan Sapi Ternak',
                'deskripsi' => 'Penjualan sapi berkualitas',
                'gambar' => 'penjualan_hewan.jpg',
                // 'id_hewan' => 2, // Sesuaikan dengan ID dari tabel jenis_hewans
                'stok' => 20,
                'harga' => 2000000,
                'satuan' => "ekor",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_produk' => 'Penjualan Daging Sapi',
                'deskripsi' => 'Daging segar dari hewan pilihan',
                'gambar' => 'penjualan_daging.jpg',
                // 'id_hewan' => 1, // Sesuaikan dengan ID dari tabel jenis_hewans
                'stok' => 50,
                'harga' => 150000,
                'satuan' => "kg",
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
