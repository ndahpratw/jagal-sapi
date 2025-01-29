@extends('layouts.main')

@section('content')
    <div class="pagetitle">
        <h1>User</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item active">User</li>
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
                            <a class="m-3 btn btn-primary" href="{{route('user.create')}}">Tambah Data</a>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <th>NO</th>
                                        <th>NAMA</th>
                                        <th>EMAIL</th>
                                        <th>ALAMAT</th>
                                        <th>NO HP</th>
                                        <th>ROLE</th>
                                        <th>AKSI</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($user as $item)
                                            <tr>
                                                <td>{{$no++}}</td>
                                                <td>{{$item->nama}}</td>
                                                <td>{{$item->email}}</td>
                                                <td>{{$item->alamat}}</td>
                                                <td>
                                                    <a href="https://wa.me/{{$item->no_telepon}}" target="_blank" class="text-primary"> <i class="bi bi-whatsapp"></i>  {{$item->no_telepon}}</a>
                                                </td>
                                                <td>{{$item->role}}</td>
                                                <td>
                                                    <a class="btn btn-primary btn-sm" href="{{route('user.edit',$item->id)}}"><i class="bi bi-pencil-fill"></i></a>
                                                    <button type="button" class="btn btn-danger btn-sm shadow-none" data-bs-toggle="modal" data-bs-target="#hapus-user{{$item->id}}"><i class="bi bi-trash-fill"></i></button>
                                                    <div class="modal fade" id="hapus-user{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title text-center">Konfirmasi Hapus User</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body text-center">
                                                                    <p style="color: black">Apakah anda yakin untuk menghapus data dari <br> <b>{{ $item->nama }}</b> ?</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary btn-sm shadow-none" data-bs-dismiss="modal">Tidak</button>
                                                                    <form action="{{ route('user.destroy', $item->id) }}" method="POST" style="display: inline;">
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