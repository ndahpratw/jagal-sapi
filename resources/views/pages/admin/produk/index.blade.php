@extends('layouts.main')

@section('content')
    <div class="pagetitle">
        <h1>Produk</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item active">Produk</li>
        </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                
                    <!-- Card -->
                   <a href="{{route('produk.create')}}">Tambah Data</a>
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
                                        <th class='w-50'>GAMBAR</th>
                                        <th >PRODUK</th>
                                        <th> HEWAN</th>
                                        <th class='w-50'>DESKRIPSI</th>
                                        <th >AKSI</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($produk as $item)
                                            <tr>
                                                <td>{{$no++}}</td>
                                                <td>
                                                    <img src="{{asset('assets/img/katalog_produk/'.$item->gambar)}}" alt="{{$item->gambar}}" class='w-50'>
                                                </td>
                                                <td>{{$item->nama_produk}}</td>
                                                <td>{{$item->jenisHewan->jenis_hewan}}</td>
                                                <td>{{$item->deskripsi}}</td>
                                                <td>
                                                    <a href="{{route('produk.edit',$item->id)}}">Edit Data</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div><!-- End Card -->
              
        
        </div>
    </section>
@endsection