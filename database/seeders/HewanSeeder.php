<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class HewanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jenis_hewans')->insert([
            [
                'jenis_hewan' => 'kambing',
                'umur' => '1-2 tahun',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jenis_hewan' => 'kambing',
                'umur' => '2-3 tahun',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jenis_hewan' => 'sapi',
                'umur' => '1-2 tahun',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jenis_hewan' => 'sapi',
                'umur' => '2-3 tahun',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
