<?php

namespace App\Http\Controllers;

use App\Models\JenisHewan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JenisHewanController extends Controller
{
    public function index() {
        //untuk menampilkan data
        $no = 1;
        $hewan = JenisHewan::all();
        return view('pages/admin/hewan/index',compact('hewan','no'));
    }

    public function create() {
        //untuk mengarahkan ke form tambah data
        return view('pages/admin/hewan/tambah');
    }

    public function store(Request $request) {
        //untuk menambahkan data
        // dd($request);
        $request->validate([
            'jenis_hewan' => 'required',
            'umur' => 'required',
        ]);
        JenisHewan::create($request->all());
        return redirect("jenis-hewan")->with("sukses","Jenis hewan berhasil ditambahkan");
    }

    public function edit() {
        //untuk mengarahkan ke form edit
        return view('pages/admin/hewan/edit');
    }

    public function update() {
        //untuk mengupdate data
    }

    public function destroy() {
        //untuk menghapus data
    }
}

