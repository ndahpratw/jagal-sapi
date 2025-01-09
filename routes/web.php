<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DasboardController;
use App\Http\Controllers\JenisHewanController;
use App\Http\Controllers\KatalogProdukController;

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
    Route::get('/jadwal-pemotongan', function () {
        return view('pages/admin/jadwal pemotongan/index');
    });
    Route::get('/laporan', function () {
        return view('pages/admin/laporan/index');
    });
    Route::get('/dashboard', function () {
        return view('pages/dashboard');
    });
});

Route::group(['middleware' => 'cekrole:admin'], function() {
    Route::resource('jenis-hewan', JenisHewanController::class)->names('jenis-hewan'); 
    Route::resource('user', UserController::class)->names('user');
    Route::resource('produk', KatalogProdukController::class)->names('produk');
    Route::get('/pesanan', function () {
        return view('pages/admin/pesanan/index');
    });
    
});

Route::group(['middleware' => 'cekrole:customer'], function() {
    Route::get('/order/{id}', [KatalogProdukController::class, 'index_user']);
    Route::post('/order', [KatalogProdukController::class, 'store']);
});








Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/login', function () {
    return view('pages/login');
});

Route::get('/pemesanan', function () {
    return view('pages/customer/pembelian');
});

use App\Http\Controllers\OrderController;

Route::get('/products/{id}/order', [OrderController::class, 'create'])->name('order.create');
Route::post('/products/{id}/order', [OrderController::class, 'store'])->name('order.store');



