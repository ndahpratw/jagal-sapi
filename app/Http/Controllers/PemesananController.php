<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Illuminate\Http\Request;
use App\Models\KatalogProduk;
use App\Http\Controllers\Controller;

class PemesananController extends Controller
{
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
        $pesanan->jumlah_pesanan=$request->jumlah;
        $pesanan->total_biaya=$request->total;
        $pesanan->alamat=$request->alamat;
        $pesanan->pesan=$request->pesan;
        if ($pesanan->save()) {
            $produk=KatalogProduk::find($request->product);
            $produk->decrement('stok',$request->jumlah);
            return redirect("/pesanan-saya")->with("sukses","Jenis hewan berhasil ditambahkan");
        } else {
            return redirect()->back();
        }
        
    }
    public function view_pesanan(){
        $pesanan=Pemesanan::where('id_konsumen',auth()->user()->id)->get();
        $menunggu_pembayaran=Pemesanan::where('id_konsumen',auth()->user()->id)->where('status_pemesanan','menunggu pembayaran')->get();
        $menunggu_konfirmasi_admin=Pemesanan::where('id_konsumen',auth()->user()->id)->where('status_pemesanan','menunggu konfirmasi admin')->get();
        $pesanan_sedang_diproses=Pemesanan::where('id_konsumen',auth()->user()->id)->where('status_pemesanan','pesanan sedang diproses')->get();
        $pesanan_selesai=Pemesanan::where('id_konsumen',auth()->user()->id)->where('status_pemesanan','pesanan selesai')->get();
        return view('pages/customer/detail-pembelian',compact('pesanan','menunggu_pembayaran','menunggu_konfirmasi_admin','pesanan_sedang_diproses','pesanan_selesai'));
        
    }
    public function pembayaran($id){
        $pesanan=Pemesanan::find($id);
        return view('pages/customer/pembayaran',compact('pesanan'));
    }
    public function bukti_pembayaran($id, Request $request){
        $request->validate([
            'bukti_pembayaran' => 'required', 
         ]);
         $pesanan=Pemesanan::find($id);
         $data = $request->except('token', 'submit', 'bukti_pembayaran');

        $image = $request->file('bukti_pembayaran');
        $imageName = $pesanan->created_at->format('ymdHis') . '' . $pesanan->produk->nama_produk . '' . auth()->user()->nama . '.' . $image->extension();
        $image->move(public_path('assets/img/bukti-pembayaran/'), $imageName);
        $data['bukti_pembayaran'] = $imageName;

        $pesanan->update([
            'bukti_pembayaran' => $imageName,
            'status_pemesanan' => 'menunggu konfirmasi admin',
        ]);
        if ($pesanan->save()) {
            return redirect("/pesanan-saya")->with("sukses","Bukti Pembayaran Berhasil Di Upload");
        } else {
            return redirect()->back();
        }
    }

        public function nota_pembayaran($id){
            $pesanan=Pemesanan::find($id);
            return view('pages/customer/nota-pembelian', compact('pesanan')) ;
        }
     
    // bagian admin
    public function index_admin(){
        $pesanan=Pemesanan::all();
        $nomer=1;
        return view('pages/admin/pesanan/index', compact('pesanan','nomer'));

    }

    //mengubah status
    public function konfirmasi($id){
        $pesanan=Pemesanan::find($id); 
        $pesanan->update([
            'status_pemesanan' => 'pesanan sedang diproses',
        ]);
        if ($pesanan->save()) {
            return redirect()->back()->with("sukses","status pemesanan berhasil diupdate");
        } else {
            return redirect()->back();
        }  
    }

    public function selesai($id){
        $pesanan=Pemesanan::find($id);
        $pesanan->update([
            'status_pemesanan' => 'pesanan selesai',
        ]);
        if ($pesanan->save()) {
            return redirect()->back()->with("sukses","status pemesanan berhasil diupdate");
        } else {
            return redirect()->back();
        }
    }
}
