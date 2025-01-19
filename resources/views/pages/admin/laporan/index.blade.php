@extends('layouts.main')

@section('content')
    <div class="pagetitle">
        <h1>Laporan</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item active">Laporan</li>
        </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <div class="row justify-content-center">
                    <!-- Card -->
                    <div class="col-lg-8">

                        <div class="row">
                            <div class="col-xl-12">
                               @if (session()->has("sukses"))
                               <div class="alert alert-primary d-flex align-items-center" role="alert">
                                <i class="bi bi-check-circle"></i>
                                <div>
                                   {{session("sukses")}}
                                </div>
                              </div>   
                               @endif
                                 
                            </div>
                           </div>
        
        
                                <div class="card">
                                    <div class="card-body">
                                        <table class="table">
                                            <thead>
                                                <th>NO</th>
                                                <th>TANGGAL PEMESANAN</th>
                                                <th>PEMESAN</th>
                                                <th>PESANAN</th>
                                                <th>JUMLAH</th>
                                                <th>BIAYA</th>
                                                <th>ALAMAT</th>
                                                <th>STATUS PESANAN</th>
                                                <th>BUKTI</th>
                                                <th>PESAN</th>
                                            </thead>
                                            <tbody>
                                               
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                    </div><!-- End Card -->
                </div>
            </div>
        </div>
    </section>
@endsection