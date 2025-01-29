<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Nota Pembayaran</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('assets/img/profile/Logo.jpg') }}" rel="icon">
  <link href="{{ asset('assets/img/profile/Logo.jpg') }}" rel="logo">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

  <div>
    <table width=100%>
      <tr>
        <td width="80%" class="my-0 py-0 text-center">
          <h6 class="text-primary">NOTA</h6>
          <p style="font-size: 12px;" class="my-0 py-0">
            JAGAL SAPI
          </p>
          <p style="font-size: 10px" class="my-0 py-0">
            Sangkapura, Bawean, Gresik <br>
            081333770512 Email : Jagalku@gmail.com
          </p>
        </td>
      </tr>
    </table>

    <hr style="border: 2px solid black">

    

    <div style="margin-top: 50px; display: flex; justify-content: center; align-items: center;">
  <table width="80%" class="table table-striped" style="font-size: 10px;  vertical-align: middle;">
      <tr>
        <td width='30%'>Tanggal Pembelian</td>
        <td>:</td>
        <td>{{$pesanan->tanggal_pemesanan}}</td>
      </tr>
      <tr>
        <td width='30%'>Pemesan</td>
        <td>:</td>
        <td>{{$pesanan->pemesan->nama}}</td>
      </tr>
      <tr>
        <td width='30%'>Jenis Produk</td>
        <td>:</td>
        <td>{{$pesanan->produk->nama_produk}}</td>
      </tr>
      <tr>
        <td width='30%'>Harga</td>
        <td>:</td>
        <td>Rp. {{$pesanan->produk->harga}}</td>
      </tr>
      <tr>
        <td width='30%'>Jumlah</td>
        <td>:</td>
        <td>{{$pesanan->jumlah_pesanan}} {{$pesanan->produk->satuan}}</td>
      </tr>
      <tr>
        <td width='30%'>Total</td>
        <td>:</td>
        <td>Rp. {{$pesanan->total_biaya}}</td>
      </tr>
      <tr>
        <td width='30%'>Pesan</td>
        <td>:</td>
        <td>{{$pesanan->pesan}}</td>
      </tr>
      </table>
    </div>

    <br>
    <p class="text-center">Terimakasih Atas Kunjungan Anda</p>

  </div>

  <script type="text/javascript">
    window.print();
  </script> 
</body>

</html>
