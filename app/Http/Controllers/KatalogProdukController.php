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
    public function index_user($id) {
        //untuk menampilkan data
        $no = 1;
        $product = KatalogProduk::find($id);
        return view('pages/customer/order',compact('product'));
    }
    public function store(Request $request) {
        //untuk menambahkan data
        // dd($request->product);
        $request->validate([
           'jumlah' => 'required', 
            'alamat' => 'required',
        ]);

        $pesanan=new Pemesanan();
        $pesanan->status_pemesanan='menunggu pembayaran';
        $pesanan->id_konsumen=auth()->user()->id;
        $pesanan->id_produk=$request->product;
        $pesanan->tanggal_pemesanan=now();
        $pesanan->total_biaya=$request->total;
        $pesanan->alamat=$request->alamat;
        $pesanan->pesan=$request->pesan;
        if ($pesanan->save()) {
            return redirect("/")->with("sukses","Jenis hewan berhasil ditambahkan");
        } else {
            return redirect()->back();
        }
        
    }
}
