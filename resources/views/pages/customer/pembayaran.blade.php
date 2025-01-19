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
    
              <div class="card">
                <div class="card-body pt-3">
               
                    <div class="row">
                        <div class="col-6 border"> 
                            <div class="m-3">
                           
                                <img class="img-fluid" src="{{asset('assets/img/qris.jpg')}}" alt="qris">  
                            </div>
                        </div>
                        <div class="col-6 border">
                             <div class="m-3">
                               
                                <div class="row">
                                    <div class="col-12 d-flex justify-content-center">
                                      <img src="{{asset('assets/img/katalog_produk/'.$pesanan->produk->gambar)}}" alt="produk" class="img-fluid w-75">
                                    </div>
                                    <div class="col-12">
                                      <div class="d-flex justify-content-between">
                                        <b>
                                          {{ $pesanan->produk->nama_produk }} 
                                        </b>
                                        
                                          x {{$pesanan->jumlah_pesanan}}
                                      </div>
                                      <p class="d-flex justify-content-end"> 
                                        {{$pesanan->produk->harga}} 
                                        <hr>
                                        <div class="d-flex justify-content-between">
                                          <p> Total Pesanan : </p>
                                          {{$pesanan->total_biaya}}
                                        </div>
                                      </p>
                                    </div>
                                  <hr>
                                </div>
                                
                                <div class="border border-danger p-3">
                                    <form action="/pembayaran/{{$pesanan->id}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('put')
                                        <div class="row">
                                            <div class="col-5">
                                                <label for="" class="form-label">Bukti Pembayaran</label>
                                            </div>
                                            <div class="col-7">
                                             
                                                <input type="file" accept="image/*" name="bukti_pembayaran" class="form-control" id="">
                                            </div> 
                                        </div>
                                        <div class="d-flex justify-content-center my-2">
                                            <button type="submit" class="btn btn-primary">Upload</button>
                                        </div>
                                       
                                    </form>
                                </div>
                              
                             </div>
                            
                        </div>
                    </div>
                 
    
                </div>
              </div>
    
            </div>
          </div>
    </section>
@endsection