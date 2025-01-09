<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KatalogProduk;
use App\Http\Controllers\Controller;

class DasboardController extends Controller
{
    public function index(){
        $layanan=KatalogProduk::all();
        return view('pages/customer/index',compact('layanan'));
    }
}
