<?php

namespace App\Models;

use App\Models\User;
use App\Models\KatalogProduk;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pemesanan extends Model
{
    use HasFactory;
    protected $table = 'pemesanans';
    protected $guarded = ['id'];
    public function produk()
    {
        return $this->belongsTo(KatalogProduk::class, 'id_produk');
    }
    public function pemesan()
    {
        return $this->belongsTo(User::class, 'id_konsumen');
    }
    public function penyembelih()
    {
        return $this->belongsTo(User::class, 'id_penyembelih');
    }
}
