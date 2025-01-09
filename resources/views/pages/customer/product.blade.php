@foreach ($products as $product)
    <div class="card p-3 mb-3">
        <h5>{{ $product->name }}</h5>
        <p>Harga: Rp {{ number_format($product->price, 2) }}</p>
        <p>{{ $product->type === 'jasa_pemotongan' ? 'Layanan' : 'Stok: ' . $product->stock }}</p>
        <a href="{{ route('order.create', $product->id) }}" class="btn btn-success">Pesan</a>
    </div>
@endforeach
