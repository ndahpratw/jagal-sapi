@extends('layouts.main')

@section('content')
    <div class="pagetitle">
        <h1>Jenis Hewan</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item active">Jenis Hewan</li>
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
                                    <thread>
                                        <th>NO</th>
                                        <th>JENIS HEWAN</th>
                                        <th>UMUR</th>
                                        <th>AKSI</th>
                                    </thread>
                                    <tbody>
                                        @foreach ($hewan as $item)
                                            <tr>
                                                <td>{{$no++}}</td>
                                                <td>{{$item->jenis_hewan}}</td>
                                                <td>{{$item->umur}}</td>
                                                <td>
                                                    <a href="{{route('jenis-hewan.edit',$item->id)}}">Edit Data</a>
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