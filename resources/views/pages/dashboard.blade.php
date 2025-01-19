@extends('layouts.main')

@section('content')
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12 ">
                <div class="row justify-content-center">
                    <!-- Card -->
                    <div class="col-lg-8"  >

                        <div class="card" style="min-height:75vh">
                            <div class="card-body text-center m-2">
                              <div class="row  justify-content-center align-items-center">
                                <img src="{{ asset('assets/img/img-1.png') }}" alt="" class="img-fluid w-75 mt-3">
                                <h3> SELAMAT DATANG <br> DI <br> SISTEM JAGAL SAPI </h3>
                              </div>
                               
                            </div>
                        </div>

                    </div><!-- End Card -->
                </div>
            </div>
        </div>
        

          </div>
    </section>
@endsection