<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Sistem Informasi Jagal</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="{{asset('template-user/css/bootstrap.min.css')}}">
      <!-- style css -->
      <link rel="stylesheet" href="{{asset('template-user/css/style.css')}}">
      <!-- Responsive-->
      <link rel="stylesheet" href="{{asset('template-user/css/responsive.css')}}">
      <!-- fevicon -->
      <link rel="icon" href="{{asset('template-user/images/fevicon.png')}}')}}" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="{{asset('template-user/css/jquery.mCustomScrollbar.min.css')}}">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <!-- owl stylesheets --> 
      <link rel="stylesheet" href="{{asset('template-user/css/owl.carousel.min.css')}}">
      <link rel="stylesheet" href="{{asset('template-user/css/owl.theme.default.min.css')}}">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
   </head>
   <body>
      <!-- header section start -->
      <div class="header_section">
         <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
               <!-- <a class="logo" href="index.html"><img src="{{asset('template-user/images/logo.png')}}"></a> -->
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto">
                     <li class="nav-item">
                        <a class="nav-link" href="/">Beranda</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="#layanan_kami">Layanan Kami</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="#tentang_kami">Tentang Kami</a>
                     </li>
                     
                  </ul>
                  <ul class="navbar-nav">
                     @if (empty(auth()->user()))
                     <li class="nav-item"><a class="nav-link" href="/login">login</a></li>
                     @else
                     <li class="nav-item border text-center"><a class="nav-link" href="/pesanan-saya">{{auth()->user()->nama}}</a></li>
                     <li class="nav-item"><a class="nav-link" href="/logout">logout</a></li>
                     @endif
                     
                  </ul>
                  {{-- <form class="form-inline my-2 my-lg-0">
                     <div class="search_icon">
                     </div>
                  </form> --}}
               </div>
         </nav>
         </div>
      </div>
      <!-- header section end -->
      <!-- banner section start -->
      <div class="banner_section layout_padding" >
         <div id="main_slider" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
               <div class="carousel-item active">
                  <div class="container">
                     <div class="row">
                        <div class="col-md-6">
                           <h1 class="banner_taital">JAGALKU <br> 
                           <p class="banner_text">Jasa Pemotongan dan Penjualan Hewan Terpercaya</p>
                           
                        </div>
                        <div class="col-md-6">
                           <div class="image_1"><img src="{{asset('template-user/images/img-1.png')}}"></div>
                        </div>
                     </div>
                  </div>
               </div>
              
             
            </div>
           
         </div>
      </div>
      <!-- banner section end -->
     
      <!-- about section end -->
      <!--  design section start -->
      <div class="design_section layout_padding" id="layanan_kami">
         <div id="my_slider" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              
               <div class="carousel-item active">
                  <div class="container">
                     <h1 class="design_taital">Layanan Kami</h1>
                     <p class="design_text">Kami adalah penyedia jasa pemotongan hewan dan penjualan hewan ternak yang berkomitmen untuk memberikan layanan terbaik bagi pelanggan. Dengan proses yang higienis, sesuai syariat, dan didukung oleh tenaga profesional, kami memastikan setiap kebutuhan Anda terpenuhi dengan kualitas yang unggul.</p>
                     <div class="design_section_2">
                        <div class="row">
                           @foreach ($layanan as $item)
                           <div class="col-md-4">
                              <div class="box_main">
                                 <p class="chair_text">{{$item->nama_produk}}</p>
                                 <div class="image_3" href="#"><img src="{{asset('assets/img/katalog_produk/'.$item->gambar)}}" alt="{{$item->gambar}}"></div>
                                 <p class="chair_text">Harga Rp. {{ number_format($item->harga, 0, ',', '.') }}</p>

                                 <div class="buy_bt"><a href="/order/{{$item->id}}">Beli</a></div>
                              </div>
                           </div>
                           @endforeach
                           
                          
                        </div>
                     </div>
                  </div>
               </div>
              
           
        
      </div>
      <!--  design section end -->
      <!--  newsletter section start -->
      <div class="newsletter_section layout_padding mt-5" id="tentang_kami">
         <div class="container">
            <div class="row">
               <div class="col-md-6">
                  <div class="imgage_6"><img src="{{asset('template-user/images/img-6.png')}}"></div>
               </div>
               <div class="col-md-6">
                  <h1 class="about_taital">Tentang Kami</h1>
                  <p class="about_text">Kami adalah penyedia jasa pemotongan hewan dan penjualan hewan ternak yang berkomitmen untuk memberikan layanan terbaik bagi pelanggan. Dengan proses yang higienis, sesuai syariat, dan didukung oleh tenaga profesional, kami memastikan setiap kebutuhan Anda terpenuhi dengan kualitas yang unggul. </p>
               </div>
            </div>
         </div>
      </div>
      
      <!-- footer section start -->
      <div class="footer_section">
         <div class="container">
            <div class="footer_location_text">
               <ul>
                  <li><img
                      src="{{asset('template-user/images/map-icon.png')}}"><span class="padding_left_10"><a href="#">Sangkapura Baweam</a></span></li>
                  <li><img src="{{asset('template-user/images/call-icon.png')}}"><span class="padding_left_10"><a href="#">Call : +6281333770512</a></span></li>
                  <li><img src="{{asset('template-user/images/mail-icon.png')}}"><span class="padding_left_10"><a href="#">jagalku@gmail.com</a></span></li>
               </ul>
            </div>
           
      <!-- footer section end -->
      <!-- copyright section start -->
      <div class="copyright_section">
        
      </div>
      <!-- copyright section end -->
      <!-- Javascript files-->
      <script src="{{asset('template-user/js/jquery.min.js')}}"></script>
      <script src="{{asset('template-user/js/popper.min.js')}}"></script>
      <script src="{{asset('template-user/js/bootstrap.bundle.min.js')}}"></script>
      <script src="{{asset('template-user/js/jquery-3.0.0.min.js')}}"></script>
      <script src="{{asset('template-user/js/plugin.js')}}"></script>
      <!-- sidebar -->
      <script src="{{asset('template-user/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
      <script src="{{asset('template-user/js/custom.js')}}"></script>
      <!-- javascript --> 
      <script src="{{asset('template-user/js/owl.carousel.js')}}"></script>
      <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
   </body>
</html>