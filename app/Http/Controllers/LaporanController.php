<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class LaporanController extends Controller
{
    public function index()
    {
        $nomer=1;
        $data_pemasukan = Pemesanan::selectRaw("DATE_FORMAT(tanggal_pemesanan, '%Y-%m') as bulan_tahun_order, CONCAT(MONTHNAME(tanggal_pemesanan), ' ', YEAR(tanggal_pemesanan)) as bulan_tahun, SUM(total_biaya) as total_biaya")
            ->groupBy('bulan_tahun_order', 'bulan_tahun')
            ->orderBy('bulan_tahun_order', 'asc')
            ->get();

        $data = DB::table('pemesanans')
            ->select('id_produk', DB::raw('SUM(jumlah_pesanan) as total_jumlah_pesanan'))
            ->groupBy('id_produk')
            ->orderByDesc('total_jumlah_pesanan')
            ->get();
        $produkData = $data->map(function ($item) {
            $produk = DB::table('katalog_produks')->where('id', $item->id_produk)->first();
            return [
                'name' => $produk->nama_produk,
                'value' => $item->total_jumlah_pesanan
            ];
        });
        
        return view('pages/admin/laporan/index', compact('nomer','data_pemasukan','produkData'));
    }
}
