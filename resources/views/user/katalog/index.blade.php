@extends('layouts.user')

@section('title', 'Katalog Produk')

@section('content')

<style>
    :root {
        --bg-main: #F8FAFC;
        --surface-light: #EFF6FF;
        --border-light: #E2E8F0;
        --text-main: #0F172A;
        --text-muted: #64748B;
        --primary-red: #EF4444;
        --primary-green: #22C55E;
    }

    body {
        background-color: var(--bg-main) !important;
    }

    .filter-card {
        background: var(--surface-light);
        border: 1px solid var(--border-light);
        border-radius: 12px;
    }

    .product-card {
        background: var(--surface-light);
        border: 1px solid var(--border-light);
        border-radius: 12px;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        height: 100%;
        transition: 0.3s;
    }

    .product-card:hover {
        transform: translateY(-5px);
        border-color: var(--primary-red);
    }

    .product-img-wrapper {
        height: 180px;
        background: #000;
        overflow: hidden;
    }

    .product-img-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .text-price {
        color: var(--primary-red);
        font-weight: bold;
    }

    .btn-add-cart {
        width: 35px;
        height: 35px;
        border-radius: 50%;
        border: 1px solid var(--primary-green);
        color: var(--primary-green);
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .btn-add-cart:hover {
        background: var(--primary-green);
        color: white;
    }

    .product-link {
        text-decoration: none;
        color: inherit;
    }

</style>

<div class="container py-4">

    <div class="row">

        <!-- FILTER -->
        <div class="col-lg-3 mb-4">
            <div class="filter-card p-3">

                <form action="/katalog" method="GET">

                    <h6 class="fw-bold mb-3">Filter</h6>

                    <!-- KATEGORI -->
                    @foreach ($kategoris as $kategori)
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="kategori" value="{{ $kategori->id }}" {{ request('kategori') == $kategori->id ? 'checked' : '' }}>
                        <label class="form-check-label small">
                            {{ $kategori->nama_kategori }}
                        </label>
                    </div>
                    @endforeach

                    <!-- HARGA -->
                    <div class="mt-3">
                        <input type="number" name="min" class="form-control mb-2" placeholder="Min" value="{{ request('min') }}">
                        <input type="number" name="max" class="form-control" placeholder="Max" value="{{ request('max') }}">
                    </div>

                    <!-- SEARCH -->
                    <div class="mt-3">
                        <input type="text" name="search" class="form-control" placeholder="Cari produk..." value="{{ request('search') }}">
                    </div>

                    <div class="mt-3 d-grid gap-2">
                        <button class="btn btn-danger btn-sm">Terapkan</button>
                        <a href="/katalog" class="btn btn-outline-secondary btn-sm">Reset</a>
                    </div>

                </form>
            </div>
        </div>

        <!-- PRODUK -->
        <div class="col-lg-9">

            <!-- SEARCH ATAS -->
            <form action="/katalog" method="GET" class="mb-3 d-flex">
                <input type="text" name="search" class="form-control form-control-sm" placeholder="Cari produk..." value="{{ request('search') }}">
                <button class="btn btn-primary btn-sm ms-2">Cari</button>
            </form>

            <div class="row g-3">
                @forelse ($barangs as $barang)
                <div class="col-md-4 col-lg-3">

                    <div class="product-card">

                        <!-- LINK KE DETAIL -->
                        <a href="{{ route('katalog.show', $barang->id) }}" class="product-link">

                            <div class="product-img-wrapper">
                                <img src="{{ $barang->gambar 
                                        ? asset('storage/' . $barang->gambar) 
                                        : asset('images/katalog/default.jpg') }}" class="img-fluid rounded">
                            </div>

                            <div class="p-2">
                                <small class="text-muted">
                                    {{ $barang->kategori->nama_kategori ?? '-' }}
                                </small>

                                <div class="fw-bold text-truncate">
                                    {{ $barang->nama_barang }}
                                </div>
                            </div>

                        </a>

                        <!-- BAGIAN BAWAH -->
                        <div class="p-2 mt-auto d-flex justify-content-between align-items-center">

                            <span class="text-price">
                                Rp {{ number_format($barang->harga,0,',','.') }}
                            </span>

                            <a href="https://wa.me/6283838762064?text=Halo admin,%20saya%20tertarik%20dengan%20produk:%20{{ urlencode($barang->nama_barang) }}" target="_blank" class="btn btn-sm btn-success d-flex align-items-center justify-content-center" style="width:35px; height:35px; border-radius:50%;">

                                <i class="bi bi-chat-dots-fill"></i>

                            </a>

                            <form action="{{ route('cart.add', $barang->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="jumlah" value="1">
                                <button type="submit" class="btn-add-cart">+</button>
                            </form>

                        </div>

                    </div>

                </div>
                @empty
                <p class="text-muted">Produk tidak ditemukan</p>
                @endforelse
            </div>

            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            <!-- PAGINATION -->
            <div class="mt-4 d-flex justify-content-center">
                {{ $barangs->links() }}
            </div>

        </div>
    </div>
</div>


@endsection
