@extends('layouts.main')

@section('content')
    <div class="pagetitle">
        <h1>Hewan</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item">Hewan</li>
            <li class="breadcrumb-item active">Tambah Data</li></ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                
                    <!-- Card -->

                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('jenis-hewan.store') }}" method="POST">
                                    @csrf
                            
                                    <div class="mb-3 mt-3">
                                        <label for="jenis_hewan" class="form-label">Jenis Hewan</label>
                                        <select name="jenis_hewan" id="jenis_hewan" class="form-select @error('jenis_hewan') is-invalid @enderror" >
                                            <option value="" disabled selected>Pilih jenis hewan</option>
                                            <option value="kambing">Kambing</option>
                                            <option value="sapi">Sapi</option>
                                            
                                        </select>
                                        @error('jenis_hewan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="umur" class="form-label">Umur</label>
                                        <input type="text" name="umur" id="umur" class="form-control @error('umur') is-invalid @enderror" placeholder="Contoh: 2 tahun" >
                                        @error('umur')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </form>
                            </div>
                        </div>

                    </div><!-- End Card -->
              
        
        </div>
    </section>
@endsection