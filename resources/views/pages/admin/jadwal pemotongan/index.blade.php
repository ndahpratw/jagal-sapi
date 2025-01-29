@extends('layouts.main')

@section('content')
    <div class="pagetitle">
        <h1>Jadwal Pemotongan</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item active">Jadwal Pemotongan</li>
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
                                        <th>JADWAL</th>
                                        <th>PENYEMBELIH</th>
                                        <th>STATUS</th>
                                    </thead>
                                    @if (auth()->user()->role=='admin')
                                        <tbody>
                                        @foreach ($pesanan as $item)
                                            <tr>
                                              <td>{{$nomer++}}</td>
                                              <td>{{$item->tanggal_pemesanan}}</td>
                                              <td>{{$item->pemesan->nama}}</td>
                                              <td>{{$item->produk->nama_produk}}</td>
                                              <td>{{$item->jumlah_pesanan}}</td>
                                              
                                              <td>
      
                                                  @if ($item->jadwal_pemotongan==null)
                                                      <form action="{{route('jadwal-pemotongan.update',$item->id)}}" method="post">
                                                          @csrf
                                                          @method('put')
                                                          <input type="date" name="tanggal_pemotongan" class="form-control @error('tanggal_pemotongan') is-invalid @enderror" placeholder="tanggal pemotongan">
                                                          @error('tanggal_pemotongan')
                                                          <div class="invalid-feedback">
                                                              {{ $message }}
                                                          </div>
                                                          @enderror
                                                          <button type="submit" class="btn btn-primary btn-sm"><i class="bi bi-send-fill"></i></button>
                                                      </form>
                                                  @else
                                                  {{$item->jadwal_pemotongan}}  
                                                  @endif
      
                                              </td>
                                              <td>
                                                  @if ($item->id_penyembelih==null)
                                                  <form action="{{route('jadwal-pemotongan.update',$item->id)}}" method="post">
                                                      @csrf
                                                      @method('put')
                                                      <select name="penyembelih" class="form-select @error('penyembelih') is-invalid @enderror" id="">
                                                          <option value="" selected disabled>pilih penyembelih</option>
                                                          @foreach ($penyembelih as $p)
                                                            <option value="{{$p->id}}">{{$p->nama}}</option>  
                                                          @endforeach
                                                      </select>
                                                      @error('penyembelih')
                                                      <div class="invalid-feedback">
                                                          {{ $message }}
                                                      </div>
                                                      @enderror
                                                      <button type="submit" class="btn btn-primary btn-sm"><i class="bi bi-send-fill"></i></button>
                                                  </form>
                                                  @else
                                                  {{$item->penyembelih->nama}}  
                                                  @endif
                                              </td>
                                              <td>
                                                  @if ($item->status_pemotongan==null)
                                                      -                                                
                                                  @else
                                                  {{$item->status_pemotongan}}
                                                  @endif
      
                                              </td>
                                            </tr>
                                            
                                        @endforeach 
                                      </tbody>
                                    @elseif(auth()->user()->role=='penyembelih')
                                        <tbody>
                                            @foreach ($data_pemotongan as $item)
                                            <tr>
                                              <td>{{$nomer++}}</td>
                                              <td>{{$item->tanggal_pemesanan}}</td>
                                              <td>{{$item->pemesan->nama}}</td>
                                              <td>{{$item->produk->nama_produk}}</td>
                                              <td>{{$item->jumlah_pesanan}}</td>
                                              <td>{{$item->jadwal_pemotongan}}</td>
                                              <td>{{$item->penyembelih->nama}}</td>
                                              <td>
                                                  @if ($item->status_pemotongan==null)
                                                      -                                                
                                                  @else
                                                    @if ($item->status_pemotongan=='sedang diproses')
                                                    <a class='btn btn-success' href="{{route('jadwal-pemotongan.show',$item->id)}}">selesai</a>   
                                                    @else
                                                    {{$item->status_pemotongan}} 
                                                    @endif
                                                 
                                                  @endif
      
                                              </td>
                                            </tr>
                                            
                                        @endforeach 
                                        </tbody>
                                    @endif
                                  
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