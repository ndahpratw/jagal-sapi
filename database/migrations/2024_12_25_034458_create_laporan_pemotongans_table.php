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
        Schema::create('laporan_pemotongans', function (Blueprint $table) {
            $table->id();
            $table->enum('status_pemotongan',["pesanan anda sedang diproses", "pesanan dalam perjalanan", "pesanan selesai"]);
            $table->string('tanggal_laporan');
            $table->string('jumlah hewan');
            $table->integer('keterangan_laporan');
            $table->foreignId('id_penyembelih')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_pemotongans');
    }
};
