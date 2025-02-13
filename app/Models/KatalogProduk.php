<?php

namespace App\Models;

use App\Models\JenisHewan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KatalogProduk extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_produk',
        'deskripsi',
        'gambar',
        'stok',
        'satuan',
        'harga',
    ];

    public function jenisHewan()
    {
        return $this->belongsTo(JenisHewan::class, 'id_hewan');
    }
}
