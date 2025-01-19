<!DOCTYPE html>
<html>
<head>
    <title>Pembelian</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Rajdhani:300,400,500,600,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
    <style>
        body {
            font-family: "Poppins";  
        }
    </style>
   
   

</head>
<body class="p-5">
    <div>
        <h1 class="text-center my-3">Pembelian Produk</h1>
        <div class="p-3">
            <div class="row">
                <div class="col-6 border"> 
                    <div class="m-3">
                        <div class="text-center">
                            <img class="img-fluid w-75" src="{{asset('assets/img/katalog_produk/'.$product->gambar)}}" alt="{{$product->gambar}}">
                            <h3>Jasa {{$product->nama_produk}}</h3> 
                            <h5>
                                " {{$product->deskripsi}} "
                            </h5>
                            <p>Rp. {{ number_format($product->harga, 0, ',', '.') }}/{{$product->satuan}}</p> 
                            <p>
                                Tersedia : {{$product->stok}} {{$product->satuan}}
                            </p>
                        </div>
                        
                    </div>
                </div>
                <div class="col-6 border">
                     <div class="m-3">
                       
                       
                        <form action="/order" method="POST">
                            @csrf 
                            <input type="hidden" name="product" value="{{$product->id}}">
                            <div class="mb-3">
                                <label for="customer_name" class="form-label">Nama Customer</label>
                                <input type="text" name="customer_name" class="form-control" readonly value="{{auth()->user()->nama}}">
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="price" class="form-label">Harga</label>
                                        <input type="text" id="price" class="form-control" value="{{ number_format($product->harga, 0, ',', '.') }}" disabled> <input type="hidden" id="price_hidden" value="{{ $product->harga }}"> <!-- Harga asli untuk perhitungan -->
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="quantity" class="form-label">Jumlah</label>
                                        <input type="number" id="quantity" name="jumlah" class="form-control"  min="1" max="{{ $product->stok }}" required >
                                        @error('jumlah')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="total" class="form-label">Total</label>
                                <input type="text" id="total1" class="form-control"  readonly>
                                <input type="hidden" id="total2" name="total">
                            </div>
                            
                            <div class="mb-3">
                                <label for="address" class="form-label">Alamat</label>
                                <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" id="address">{{ auth()->user()->alamat }}</textarea>
                                @error('alamat')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                            </div>
                            
                           
                            <div class="mb-3">
                                <label for="note" class="form-label">Pesan (Opsional)</label>
                                <textarea name="pesan" class="form-control" rows="2"></textarea>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="/" class="btn btn-secondary">Batal</a>
                                <button type="submit" class="btn btn-primary">Buat Pesanan</button>   
                            </div>
                            
                        </form>
                     </div>
                    
                </div>
            </div>
           
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const priceHidden = document.getElementById('price_hidden');
            const quantityInput = document.getElementById('quantity');
            const totalInput1 = document.getElementById('total1');
            const totalInput2 = document.getElementById('total2');
    
            // Event listener untuk menghitung total harga
            quantityInput.addEventListener('input', function () {
                const price = parseInt(priceHidden.value);
                const quantity = parseInt(quantityInput.value) || 0;
    
                // Hitung total
                const total = price * quantity;
    
                // Tampilkan total dalam format angka
                totalInput1.value = total.toLocaleString('id-ID');
                totalInput2.value = parseInt(total, 10);

            });
        });
    </script>
</body>
</html>
