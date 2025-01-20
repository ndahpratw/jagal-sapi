<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('katalog_produks', function (Blueprint $table) {
            $table->id();
            // $table->enum('nama_produk',["Pemotongan Sapi", "Penjualan Sapi Ternak", "Penjualan Daging Sapi"]);
            $table->string('nama_produk');
            $table->string('deskripsi');
            $table->string('gambar');
            // $table->foreignId('id_hewan')->references('id')->on('jenis_hewans')->onDelete('cascade');
            $table->integer('stok');
            $table->enum('satuan',["kg", "ekor"]);
            $table->integer('harga');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('katalog_produks');
    }
};
