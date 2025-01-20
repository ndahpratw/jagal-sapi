<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JadwalPemotonganController extends Controller
{
    public function index(){
        $pesanan=Pemesanan::where('id_produk',1)->whereNotIn('status_pemesanan',['menunggu pembayaran','menunggu konfirmasi admin'])->get();
        $penyembelih=User::where('role','penyembelih')->get();
        $data_pemotongan=Pemesanan::where('id_produk',1)->where('id_penyembelih', auth()->user()->id)->get();
        $nomer=1;
        return view('pages/admin/jadwal pemotongan/index',compact('pesanan','nomer','penyembelih','data_pemotongan'));
    }
    public function update($id,Request $request){
        $pesanan=Pemesanan::find($id);
        if ($request->has('tanggal_pemotongan')) {
            $request->validate([
                'tanggal_pemotongan' => 'required',
            ]);
            $pesanan->update([
                'status_pemotongan' => 'sedang diproses',
                'jadwal_pemotongan' => $request->tanggal_pemotongan
            ]);
        } else{
            $request->validate([
                'penyembelih' => 'required',
            ]);
            $pesanan->update([
                'status_pemotongan' => 'sedang diproses',
                'id_penyembelih' => $request->penyembelih
            ]);
        }

        if ($pesanan->save()) {
            return redirect()->back()->with("sukses","data berhasil diupdate");
        } else {
            return redirect()->back();
        }  
    }
    public function show($id){
        $pesanan=Pemesanan::find($id);
        $pesanan->update([
            'status_pemotongan' => 'selesai'
        ]);
        if ($pesanan->save()) {
            return redirect()->back()->with("sukses","data berhasil diupdate");
        } else {
            return redirect()->back();
        }  
    }
}
