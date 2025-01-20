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
   public function create() {
    return view('pages/admin/produk/create');
   }
  // Menyimpan produk yang ditambahkan
  public function store(Request $request)
  {
      // Validasi input
      $request->validate([
          'nama_produk' => 'required|string|max:255',
          'deskripsi' => 'required|string|max:500',
          'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Menambahkan aturan mime type dan ukuran
          'stok' => 'required|integer|min:1',
          'satuan' => 'required|string',
          'harga' => 'required|integer|min:1000'
      ]);
  
      // Menangani file gambar
      $image = $request->file('gambar');
      $imageName = now()->timestamp . '-' . $request->nama_produk . '.' . $image->extension();
      
      // Menyimpan gambar ke folder public/assets/img/katalog_produk/
      $image->move(public_path('assets/img/katalog_produk/'), $imageName);
  
      // Simpan data produk ke database
      KatalogProduk::create([
          'nama_produk' => $request->nama_produk,
          'deskripsi' => $request->deskripsi,
          'gambar' =>  $imageName, // Menyimpan path relatif
          'stok' => $request->stok,
          'satuan' => $request->satuan,
          'harga' => $request->harga
      ]);
  
      // Redirect dengan pesan sukses
      return redirect()->route('produk.index')->with('sukses', 'Produk berhasil ditambahkan!');
  }
  public function edit($id) {
    $produk=KatalogProduk::find($id);
    return view('pages/admin/produk/edit', compact('produk'));
   }
   public function update(Request $request,$id)
  {
      // Validasi input
      $request->validate([
          'nama_produk' => 'required|string|max:255',
          'deskripsi' => 'required|string|max:500',
          'stok' => 'required|integer|min:1',
          'satuan' => 'required|string',
          'harga' => 'required|integer|min:1000'
      ]);
      $produk=KatalogProduk::find($id);
      if ($request->has('gambar')) {
          // Menangani file gambar
            $image = $request->file('gambar');
            $imageName = now()->timestamp . '-' . $request->nama_produk . '.' . $image->extension();
            
            // Menyimpan gambar ke folder public/assets/img/katalog_produk/
            $image->move(public_path('assets/img/katalog_produk/'), $imageName);
      } else {
        $imageName=$produk->gambar;
      }

      $produk->update([
        'nama_produk' => $request->nama_produk,
        'deskripsi' => $request->deskripsi,
        'gambar' =>  $imageName, // Menyimpan path relatif
        'stok' => $request->stok,
        'satuan' => $request->satuan,
        'harga' => $request->harga
    ]);

    return redirect()->route('produk.index')->with('sukses', 'Produk berhasil diperbarui!');
}
public function destroy($id) {    
    $produk = KatalogProduk::find($id);

    if ($produk->gambar) {
        $fotoPath = public_path('assets/img/katalog_produk/' . $produk->gambar);

        if (file_exists($fotoPath)) {
            unlink($fotoPath);
        }
    }

    if ($produk->delete()){
        return redirect()->back()->with('sukses', 'Data berhasil dihapus!');
    } else {
        return redirect()->back()->with('error', 'Gagal menghapus data');
    }
}
}
