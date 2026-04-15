@extends('layouts.user')

@section('content')

<style>
    .btn-light:hover {
        background-color: #f1f5f9;
    }

    .card {
        transition: 0.2s;
    }

    .card:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
    }

</style>

<div class="container py-5">

    <!-- BACK -->
    <div class="mb-4">
        <button onclick="history.back()" class="btn btn-light border rounded-pill px-3 py-1 shadow-sm">
            ← Kembali
        </button>
    </div>

    <div class="row g-4 align-items-start">

        <!-- GAMBAR -->
        <div class="col-md-5">
            <div class="card border-0 shadow-sm p-3 text-center" style="border-radius:16px;">
                <img src="{{ asset('storage/' . ltrim($barang->gambar, '/')) }}"
                     onerror="this.src='{{ asset('images/katalog/default.jpg') }}'"
                     style="max-height:350px; object-fit:contain;"
                     class="img-fluid rounded">
            </div>
        </div>

        <!-- DETAIL -->
        <div class="col-md-7">
            <div class="card border-0 shadow-sm p-4 h-100" style="border-radius:16px;">

                <!-- KATEGORI -->
                <span class="badge bg-light text-dark mb-2">
                    {{ $barang->kategori->nama_kategori ?? '-' }}
                </span>

                <!-- NAMA -->
                <h3 class="fw-bold mb-2">
                    {{ $barang->nama_barang }}
                </h3>

                <!-- HARGA -->
                <h4 class="text-danger fw-bold mb-3">
                    Rp {{ number_format($barang->harga,0,',','.') }}
                </h4>

                <!-- DESKRIPSI -->
                <p class="text-muted mb-4" style="line-height:1.6;">
                    {{ $barang->deskripsi ?? 'Tidak ada deskripsi.' }}
                </p>

                <!-- ACTION -->
                <div class="mt-auto">

                    <div class="d-flex gap-2">

                        <!-- ADD TO CART -->
                        <form action="{{ route('cart.add', $barang->id) }}" method="POST" class="flex-grow-1">
                            @csrf
                            <input type="hidden" name="jumlah" value="1">
                            <button type="submit" class="btn btn-primary w-100 rounded-pill fw-bold py-2">
                                + Tambah ke Keranjang
                            </button>
                        </form>

                        <!-- WA -->
                        <a href="https://wa.me/6283838762064?text=Halo admin,%20saya%20tertarik%20dengan%20produk:%20{{ urlencode($barang->nama_barang) }}"
                           target="_blank"
                           class="btn btn-success d-flex align-items-center justify-content-center"
                           style="width:50px; border-radius:12px;">
                           <i class="bi bi-whatsapp"></i>
                        </a>

                    </div>

                </div>

            </div>
        </div>

    </div>

</div>
@endsection
