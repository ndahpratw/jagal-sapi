<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * Relasi ke tabel orders.
     * Satu produk bisa memiliki banyak pesanan.
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
