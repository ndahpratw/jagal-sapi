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
                            <a class="m-3 btn btn-primary" href="{{route('produk.create')}}">Tambah Data</a>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <th>NO</th>
                                        <th class="w-25">GAMBAR</th>
                                        <th >PRODUK</th>
                                        <th >STOK</th>
                                        <th >DESKRIPSI</th>
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
                                                <td>{{$item->stok}} {{$item->satuan}}</td>
                                                <td>{{$item->deskripsi}}</td>
                                                <td>
                                                    <a class="btn btn-primary btn-sm" href="{{route('produk.edit',$item->id)}}"><i class="bi bi-pencil-fill"></i></a>
                                                    <button type="button" class="btn btn-danger btn-sm shadow-none" data-bs-toggle="modal" data-bs-target="#hapus-produk{{$item->id}}"><i class="bi bi-trash-fill"></i></button>
                                                    <div class="modal fade" id="hapus-produk{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title text-center">Konfirmasi Hapus Produk</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body text-center">
                                                                    <p style="color: black">Apakah anda yakin untuk menghapus <br> <b>{{ $item->nama_produk }}</b> beserta data terkait dari katalog ?</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary btn-sm shadow-none" data-bs-dismiss="modal">Tidak</button>
                                                                    <form action="{{ route('produk.destroy', $item->id) }}" method="POST" style="display: inline;">
                                                                        @method('delete')
                                                                        @csrf
                                                                        <input type="submit" value="Hapus" class="btn btn-danger btn-sm shadow-none">
                                                                    </form> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
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