<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Illuminate\Http\Request;
use App\Models\KatalogProduk;
use App\Http\Controllers\Controller;

class KatalogProdukController extends Controller
{
    public function index() {
        //untuk menampilkan data
        $no = 1;
        $produk = KatalogProduk::all();
        return view('pages/admin/produk/index',compact('produk','no'));
    }
   
}
