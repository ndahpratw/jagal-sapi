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
                   <a href="{{route('jenis-hewan.create')}}">Tambah Data</a>
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
                                                <td>{{$item->no_telepon}}</td>
                                                <td>{{$item->role}}</td>
                                                <td>
                                                    <a href="{{route('user.edit',$item->id)}}">Edit Data</a>
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