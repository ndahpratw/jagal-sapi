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
              @if (session()->has('sukses'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <i class="bi bi-check-circle me-1"></i>
                    {{ session('sukses') }}
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
                      <button class="nav-link" data-bs-toggle="tab" data-bs-target="#belum-bayar">menunggu pembayaran</button>
                    </li>
    
                    <li class="nav-item">
                      <button class="nav-link" data-bs-toggle="tab" data-bs-target="#menunggu-konfirmasi">menunggu konfirmasi admin</button>
                    </li>
    
                    <li class="nav-item">
                      <button class="nav-link" data-bs-toggle="tab" data-bs-target="#dikirim">pesananan sedang diproses</button>
                    </li>
    
                    <li class="nav-item">
                      <button class="nav-link" data-bs-toggle="tab" data-bs-target="#selesai">pesanan selesai</button>
                    </li>
    
                    {{-- <li class="nav-item">
                      <button class="nav-link" data-bs-toggle="tab" data-bs-target="#dibatalkan">Dibatalkan</button>
                    </li> --}}
                  </ul>
    
                  <div class="tab-content pt-2">
    
                    <div class="tab-pane fade show active " id="semua-pesanan">  
                      @if (count($pesanan))
                      <div class="row">
                        @foreach ($pesanan as $item)
                        <div class="col-md-6 my-3">
                          <div class="card">
                            <div class="card-body my-4">
                              <div class="d-flex justify-content-between align-item-center">
                                {{-- <p style="color: #254336">Nama</p> --}}
                                  <p class="text-danger">{{$item->status_pemesanan}}</p>
                              </div>

                              <div class="row">
                                <div class="col-md-3">
                                  <img src="{{asset('assets/img/katalog_produk/'.$item->produk->gambar)}}" alt="produk" class="img-fluid">
                                </div>
                                <div class="col-md-9">
                                  <div class="d-flex justify-content-between">
                                    <b>
                                      {{ $item->produk->nama_produk }} 
                                    </b>
                                    
                                      x {{$item->jumlah_pesanan}}
                                  </div>
                                  <p class="d-flex justify-content-end"> 
                                    {{$item->produk->harga}} 
                                    <hr>
                                    <div class="d-flex justify-content-between">
                                      <p> Total Pesanan : </p>
                                      {{$item->total_biaya}}
                                    </div>
                                  </p>
                                </div>
                              <hr>
                              </div>
                              @if ($item->status_pemesanan=='menunggu pembayaran')
                              <div class="d-flex justify-content-center align-items-center">
                                <a  class='text-center btn btn-danger' href="/pembayaran/{{$item->id}}">Bayar Sekarang</a>
                              </div>
                              @elseif ($item->status_pemesanan!="menunggu pembayaran" || $item->status_pemesanan!="menunggu konfirmasi admin")
                              <div class="d-flex justify-content-center align-items-center">
                                <a href="/nota-pembayaran/{{$item->id}}" class="btn btn-primary">Nota Pembelian</a>
                              </div>
                              

                              @endif
                             
                            </div>
                          </div>
                        </div>
                        @endforeach
                         
                      </div>
                      @else
                      <div class="d-flex justify-content-center align-items-center my-5 text-danger">
                        Tidak Ada Pesanan
                      </div>
                          
                      @endif        
                       
                    </div>
    
                    <div class="tab-pane fade pt-3" id="belum-bayar">
                      @if (count($menunggu_pembayaran))
                      <div class="row">
                        @foreach ($menunggu_pembayaran as $item)
                        <div class="col-md-6 my-3">
                          <div class="card">
                            <div class="card-body my-4">
                              <div class="d-flex justify-content-between align-item-center">
                                {{-- <p style="color: #254336">Nama</p> --}}
                                  <p class="text-danger">{{$item->status_pemesanan}}</p>
                              </div>

                              <div class="row">
                                <div class="col-md-3">
                                  <img src="{{asset('assets/img/katalog_produk/'.$item->produk->gambar)}}" alt="produk" class="img-fluid">
                                </div>
                                <div class="col-md-9">
                                  <div class="d-flex justify-content-between">
                                    <b>
                                      {{ $item->produk->nama_produk }} 
                                    </b>
                                    
                                      x {{$item->jumlah_pesanan}}
                                  </div>
                                  <p class="d-flex justify-content-end"> 
                                    {{$item->produk->harga}} 
                                    <hr>
                                    <div class="d-flex justify-content-between">
                                      <p> Total Pesanan : </p>
                                      {{$item->total_biaya}}
                                    </div>
                                  </p>
                                </div>
                              <hr>
                              </div>
                              @if ($item->status_pemesanan=='menunggu pembayaran')
                              <div class="d-flex justify-content-center align-items-center">
                                <a  class='text-center btn btn-danger' href="/pembayaran/{{$item->id}}">Bayar Sekarang</a>
                              </div>
                              @elseif ($item->status_pemesanan!="menunggu pembayaran" || $item->status_pemesanan!="menunggu konfirmasi admin")
                              <div class="d-flex justify-content-center align-items-center">
                                <a href="/nota-pembayaran/{{$item->id}}" class="btn btn-primary">Nota Pembelian</a>
                              </div>
                              

                              @endif
                             
                            </div>
                          </div>
                        </div>
                        @endforeach
                         
                      </div>
                      @else
                      <div class="d-flex justify-content-center align-items-center my-5 text-danger">
                        Tidak Ada Pesanan
                      </div>
                          
                      @endif        
                    </div>
    
                    <div class="tab-pane fade pt-3" id="menunggu-konfirmasi">
                      @if (count($menunggu_konfirmasi_admin))
                      <div class="row">
                        @foreach ($menunggu_konfirmasi_admin as $item)
                        <div class="col-md-6 my-3">
                          <div class="card">
                            <div class="card-body my-4">
                              <div class="d-flex justify-content-between align-item-center">
                                {{-- <p style="color: #254336">Nama</p> --}}
                                  <p class="text-danger">{{$item->status_pemesanan}}</p>
                              </div>

                              <div class="row">
                                <div class="col-md-3">
                                  <img src="{{asset('assets/img/katalog_produk/'.$item->produk->gambar)}}" alt="produk" class="img-fluid">
                                </div>
                                <div class="col-md-9">
                                  <div class="d-flex justify-content-between">
                                    <b>
                                      {{ $item->produk->nama_produk }} 
                                    </b>
                                    
                                      x {{$item->jumlah_pesanan}}
                                  </div>
                                  <p class="d-flex justify-content-end"> 
                                    {{$item->produk->harga}} 
                                    <hr>
                                    <div class="d-flex justify-content-between">
                                      <p> Total Pesanan : </p>
                                      {{$item->total_biaya}}
                                    </div>
                                  </p>
                                </div>
                              <hr>
                              </div>
                              @if ($item->status_pemesanan=='menunggu pembayaran')
                              <div class="d-flex justify-content-center align-items-center">
                                <a  class='text-center btn btn-danger' href="/pembayaran/{{$item->id}}">Bayar Sekarang</a>
                              </div>
                              @elseif ($item->status_pemesanan!="menunggu pembayaran" || $item->status_pemesanan!="menunggu konfirmasi admin")
                              <div class="d-flex justify-content-center align-items-center">
                                <a href="/nota-pembayaran/{{$item->id}}" class="btn btn-primary">Nota Pembelian</a>
                              </div>

                              @endif
                             
                            </div>
                          </div>
                        </div>
                        @endforeach
                         
                      </div>
                      @else
                      <div class="d-flex justify-content-center align-items-center my-5 text-danger">
                        Tidak Ada Pesanan
                      </div>
                          
                      @endif  
                    </div>
    
                    <div class="tab-pane fade pt-3" id="dikirim">
                      @if (count($pesanan_sedang_diproses))
                      <div class="row">
                        @foreach ($pesanan_sedang_diproses as $item)
                        <div class="col-md-6 my-3">
                          <div class="card">
                            <div class="card-body my-4">
                              <div class="d-flex justify-content-between align-item-center">
                                {{-- <p style="color: #254336">Nama</p> --}}
                                  <p class="text-danger">{{$item->status_pemesanan}}</p>
                              </div>

                              <div class="row">
                                <div class="col-md-3">
                                  <img src="{{asset('assets/img/katalog_produk/'.$item->produk->gambar)}}" alt="produk" class="img-fluid">
                                </div>
                                <div class="col-md-9">
                                  <div class="d-flex justify-content-between">
                                    <b>
                                      {{ $item->produk->nama_produk }} 
                                    </b>
                                    
                                      x {{$item->jumlah_pesanan}}
                                  </div>
                                  <p class="d-flex justify-content-end"> 
                                    {{$item->produk->harga}} 
                                    <hr>
                                    <div class="d-flex justify-content-between">
                                      <p> Total Pesanan : </p>
                                      {{$item->total_biaya}}
                                    </div>
                                  </p>
                                </div>
                              <hr>
                              </div>
                              @if ($item->status_pemesanan=='menunggu pembayaran')
                              <div class="d-flex justify-content-center align-items-center">
                                <a  class='text-center btn btn-danger' href="/pembayaran/{{$item->id}}">Bayar Sekarang</a>
                              </div>
                              @elseif ($item->status_pemesanan!="menunggu pembayaran" || $item->status_pemesanan!="menunggu konfirmasi admin")
                              <div class="d-flex justify-content-center align-items-center">
                                <a href="/nota-pembayaran/{{$item->id}}" class="btn btn-primary">Nota Pembelian</a>
                              </div>
                              

                              @endif
                             
                            </div>
                          </div>
                        </div>
                        @endforeach
                         
                      </div>
                      @else
                      <div class="d-flex justify-content-center align-items-center my-5 text-danger">
                        Tidak Ada Pesanan
                      </div>
                          
                      @endif  
                    </div>
    
                    <div class="tab-pane fade pt-3" id="selesai">
                      @if (count($pesanan_selesai))
                      <div class="row">
                        @foreach ($pesanan_selesai as $item)
                        <div class="col-md-6 my-3">
                          <div class="card">
                            <div class="card-body my-4">
                              <div class="d-flex justify-content-between align-item-center">
                                {{-- <p style="color: #254336">Nama</p> --}}
                                  <p class="text-danger">{{$item->status_pemesanan}}</p>
                              </div>

                              <div class="row">
                                <div class="col-md-3">
                                  <img src="{{asset('assets/img/katalog_produk/'.$item->produk->gambar)}}" alt="produk" class="img-fluid">
                                </div>
                                <div class="col-md-9">
                                  <div class="d-flex justify-content-between">
                                    <b>
                                      {{ $item->produk->nama_produk }} 
                                    </b>
                                    
                                      x {{$item->jumlah_pesanan}}
                                  </div>
                                  <p class="d-flex justify-content-end"> 
                                    {{$item->produk->harga}} 
                                    <hr>
                                    <div class="d-flex justify-content-between">
                                      <p> Total Pesanan : </p>
                                      {{$item->total_biaya}}
                                    </div>
                                  </p>
                                </div>
                              <hr>
                              </div>
                              @if ($item->status_pemesanan=='menunggu pembayaran')
                              <div class="d-flex justify-content-center align-items-center">
                                <a  class='text-center btn btn-danger' href="/pembayaran/{{$item->id}}">Bayar Sekarang</a>
                              </div>
                              @elseif ($item->status_pemesanan!="menunggu pembayaran" || $item->status_pemesanan!="menunggu konfirmasi admin")
                              <div class="d-flex justify-content-center align-items-center">
                                <a href="/nota-pembayaran/{{$item->id}}" class="btn btn-primary">Nota Pembelian</a>
                              </div>
                              

                              @endif
                             
                            </div>
                          </div>
                        </div>
                        @endforeach
                         
                      </div>
                      @else
                      <div class="d-flex justify-content-center align-items-center my-5 text-danger">
                        Tidak Ada Pesanan
                      </div>
                          
                      @endif     
                    </div>
    
                    
                  </div><!-- End Bordered Tabs -->
    
                </div>
              </div>
    
            </div>
          </div>
    </section>
@endsection