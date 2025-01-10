@extends('layouts.main')

@section('content')
    <div class="pagetitle">
        <h1>Pesanan Saya</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item active">Pesanan Saya</li>
        </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="col-xl-12">
              @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <i class="bi bi-check-circle me-1"></i>
                    {{ session('success') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              @elseif (session()->has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <i class="bi bi-exclamation-octagon me-1"></i>
                    {{ session('error') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              @endif
            </div>
    
            <div class="col-xl-12">
    
              <div class="card">
                <div class="card-body pt-3">
                  <ul class="nav nav-tabs nav-tabs-bordered justify-content-between">
    
                    <li class="nav-item">
                      <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#semua-pesanan">Semua</button>
                    </li>
    
                    <li class="nav-item">
                      <button class="nav-link" data-bs-toggle="tab" data-bs-target="#belum-bayar">Belum Bayar</button>
                    </li>
    
                    <li class="nav-item">
                      <button class="nav-link" data-bs-toggle="tab" data-bs-target="#sedang-dikemas">Sedang Dikemas</button>
                    </li>
    
                    <li class="nav-item">
                      <button class="nav-link" data-bs-toggle="tab" data-bs-target="#dikirim">Dikirim</button>
                    </li>
    
                    <li class="nav-item">
                      <button class="nav-link" data-bs-toggle="tab" data-bs-target="#selesai">Selesai</button>
                    </li>
    
                    <li class="nav-item">
                      <button class="nav-link" data-bs-toggle="tab" data-bs-target="#dibatalkan">Dibatalkan</button>
                    </li>
                  </ul>
    
                  <div class="tab-content pt-2">
    
                    <div class="tab-pane fade show active " id="semua-pesanan">          
                        <div class="row">
                            <div class="col-md-6 my-3">
                              <div class="card">
                                <div class="card-body my-4">
                                  <div class="d-flex justify-content-between align-item-center">
                                    <p style="color: #254336">Nama</p>
                                      <p class="text-danger">Status Pesanan</p>
                                  </div>
    
                                  <div class="row">
                                    <div class="col-md-3">
                                      <img src="" alt="produk" class="img-fluid">
                                    </div>
                                    <div class="col-md-9">
                                      <div class="d-flex justify-content-between">
                                        <b>
                                          {{-- {{ $item->produk->nama_produk }} --}} Nama
                                        </b>
                                        
                                          x 5
                                      </div>
                                      <p class="d-flex justify-content-end"> 
                                        2000000 
                                        <hr>
                                        <div class="d-flex justify-content-between">
                                          <p> Total Pesanan : </p>
                                          7
                                        </div>
                                      </p>
                                    </div>
                                  <hr>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
    
                    <div class="tab-pane fade pt-3" id="belum-bayar">
                        belum bayar
                    </div>
    
                    <div class="tab-pane fade pt-3" id="sedang-dikemas">
                        dikemas
                    </div>
    
                    <div class="tab-pane fade pt-3" id="dikirim">
                        dikirim
                    </div>
    
                    <div class="tab-pane fade pt-3" id="selesai">
                        selesai
                    </div>
    
                    <div class="tab-pane fade pt-3" id="dibatalkan">
                     dibatalkan
                    </div>
                  </div><!-- End Bordered Tabs -->
    
                </div>
              </div>
    
            </div>
          </div>
    </section>
@endsection