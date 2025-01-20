@extends('layouts.main')

@section('content')
    <div class="pagetitle">
        <h1>Produk</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item">Produk</li>
            <li class="breadcrumb-item active">Tambah Data</li>
        </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body mt-3">
                        <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="mb-3">
                                <label for="nama_produk" class="form-label">Nama Produk</label>
                                <input type="text" name="nama_produk" id="nama_produk" class="form-control" value="{{ old('nama_produk') }}">
                                @error('nama_produk')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <textarea id="deskripsi" name="deskripsi" class="form-control">{{ old('deskripsi') }}</textarea>
                                @error('deskripsi')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        
                            <div class="mb-3">
                                <label for="gambar" class="form-label">Gambar Produk</label>
                                <input type="file" id="gambar" name="gambar" class="form-control" accept="image/*">
                                @error('gambar')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        
                            <div class="mb-3">
                                <label for="stok" class="form-label">Stok</label>
                                <input type="number" id="stok" name="stok" class="form-control" value="{{ old('stok') }}">
                                @error('stok')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        
                            <div class="mb-3">
                                <label for="satuan" class="form-label">Satuan</label>
                                <select id="satuan" name="satuan" class="form-select">
                                    <option value="kg" {{ old('satuan') == 'kg' ? 'selected' : '' }}>kg</option>
                                    <option value="ekor" {{ old('satuan') == 'ekor' ? 'selected' : '' }}>ekor</option>
                                </select>
                                @error('satuan')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        
                            <div class="mb-3">
                                <label for="harga" class="form-label">Harga</label>
                                <input type="number" id="harga" name="harga" class="form-control" value="{{ old('harga') }}">
                                @error('harga')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        
                            <button type="submit" class="btn btn-primary">Tambah Produk</button>
                        </form>
                         
                    </div>
                </div>

            </div><!-- End Card -->
        </div>
    </section>
@endsection