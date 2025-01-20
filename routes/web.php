<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\DasboardController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\JenisHewanController;
use App\Http\Controllers\KatalogProdukController;
use App\Http\Controllers\JadwalPemotonganController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/', [DasboardController::class, 'index']);


Route::group(['middleware' => 'cekrole:admin,penyembelih'], function() {
   
    Route::resource('jadwal-pemotongan', JadwalPemotonganController::class)->names('jadwal-pemotongan');
    Route::get('/dashboard', function () {
        return view('pages/dashboard');
    });
});

Route::group(['middleware' => 'cekrole:admin'], function() {
    Route::resource('jenis-hewan', JenisHewanController::class)->names('jenis-hewan'); 
    Route::resource('user', UserController::class)->names('user');
    Route::resource('produk', KatalogProdukController::class)->names('produk');
    Route::get('/pesanan', [PemesananController::class, 'index_admin']); 
    Route::get('/konfirmasi/{id}', [PemesananController::class, 'konfirmasi']);
    Route::get('/selesai/{id}', [PemesananController::class, 'selesai']);
    Route::get('/laporan', [LaporanController::class, 'index']); 
   
});

Route::group(['middleware' => 'cekrole:customer'], function() {
    Route::get('/order/{id}', [PemesananController::class, 'index_user']);
    Route::post('/order', [PemesananController::class, 'store']);
    Route::get('/pesanan-saya', [PemesananController::class, 'view_pesanan']); 
    Route::get('/pembayaran/{id}', [PemesananController::class, 'pembayaran']);
    Route::put('/pembayaran/{id}', [PemesananController::class, 'bukti_pembayaran']);
    Route::get('/nota-pembayaran/{id}', [PemesananController::class, 'nota_pembayaran']);
});








Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/login', function () {
    return view('pages/login');
});

Route::get('/register', function () {
    return view('pages/register');
});

Route::post('/register', [LoginController::class, 'register']);

Route::get('/pemesanan', function () {
    return view('pages/customer/pembelian');
});

