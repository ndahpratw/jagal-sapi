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
        Schema::create('pemesanans', function (Blueprint $table) {
            $table->id();
            $table->enum('status_pemesanan',["menunggu pembayaran", "menunggu konfirmasi admin", "pesanan sedang diproses", "pesanan selesai"]);
            $table->foreignId('id_laporan')->nullable()->references('id')->on('laporan_pemotongans')->onDelete('cascade');
            $table->foreignId('id_konsumen')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('id_produk')->references('id')->on('katalog_produks')->onDelete('cascade');
            $table->date('tanggal_pemesanan');
            $table->date('jadwal_pemotongan')->nullable();
            $table->enum('status_pemotongan', ["sedang diproses", "selesai"])->nullable();
            $table->integer('jumlah_pesanan');
            $table->integer('total_biaya');
            $table->string('alamat');
            $table->string('pesan')->nullable();
            $table->string('bukti_pembayaran')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemesanans');
    }
};
