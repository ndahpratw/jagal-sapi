@extends('layouts.main')

@section('content')
    <div class="pagetitle">
        <h1>Pesanan</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item active">Pesanan</li>
        </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-xl-12">
                       @if (session()->has("sukses"))
                       <div class="alert alert-success d-flex align-items-center" role="alert">
                        <i class="bi bi-check-circle"></i>
                        <div>
                           {{session("sukses")}}
                        </div>
                      </div>   
                       @endif
                       
                       <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <th>NO</th>
                                        <th>TANGGAL</th>
                                        <th>PEMESAN</th>
                                        <th>PESANAN</th>
                                        <th>JUMLAH</th>
                                        <th>BIAYA</th>
                                        <th>ALAMAT</th>
                                        <th>STATUS</th>
                                        <th>BUKTI</th>
                                        <th>PESAN</th>
                                        <th></th>
                                    </thead>
                                    <tbody>
                                      @foreach ($pesanan as $item)
                                          <tr>
                                            <td>{{$nomer++}}</td>
                                            <td>{{$item->tanggal_pemesanan}}</td>
                                            <td>{{$item->pemesan->nama}}</td>
                                            <td>{{$item->produk->nama_produk}}</td>
                                            <td>{{$item->jumlah_pesanan}}</td>
                                            <td>{{$item->total_biaya}}</td>
                                            <td>{{$item->alamat}}</td>
                                            <td>{{$item->status_pemesanan}}</td>
                                            <td>
                                                @if ($item->bukti_pembayaran==null)
                                                   <button class="btn btn-secondary"><i class="bi bi-card-image"></i></button>
                                                @else
                                                <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#bukti_pembayaran{{$item->id}}">
                                                        <i class="bi bi-card-image"></i>
                                                    </button>
    
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="bukti_pembayaran{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Bukti Pembayaran</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body text-center">
                                                        <img src="{{asset('assets/img/bukti-pembayaran/'.$item->bukti_pembayaran)}}" alt="{{$item->bukti_pembayaran}}" class="img-fluid w-75">
                                                        </div>
                                                        <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    </div>
                                                @endif
                                                </td>
                                            <td>
                                                @if ($item->pesan==null)
                                                    -
                                                @else
                                                {{$item->pesan}}   
                                                @endif
                                            </td>
                                                <td>
                                                    @if ($item->status_pemesanan=='menunggu konfirmasi admin')
                                                        <a href="/konfirmasi/{{$item->id}}" class="btn btn-outline-primary">Konfirmasi</a>
                                                    @elseif ($item->status_pemesanan=='pesanan sedang diproses')
                                                        <a href="/selesai/{{$item->id}}" class="btn btn-outline-success">Selesai</a>
                                                    @elseif ($item->status_pemesanan=='pesanan selesai')
                                                    <p class="text-success">Pesanan Selesai</p>
                                                    @elseif ($item->status_pemesanan=='menunggu pembayaran')
                                                    <p class="text-secondary">Belum Dibayar</p>
                                                    @endif
                                                </td>
                                          </tr>
                                          
                                      @endforeach 
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection