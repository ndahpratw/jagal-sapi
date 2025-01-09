<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * Relasi ke tabel products.
     * Pesanan ini terkait dengan satu produk.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
