@extends('layouts.user')

@section('title', 'Blog & Tips Otomotif')

@section('content')

<style>
    .blog-card {
        border-radius: 16px;
        background: var(--surface-white);
        border: 1px solid var(--border-light);
        transition: 0.25s;
        height: 100%;
    }

    .blog-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 12px 25px rgba(0, 0, 0, 0.06);
        border-color: var(--primary-blue);
    }

    .blog-icon {
        width: 60px;
        height: 60px;
        background: var(--surface-light);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
    }

    .read-more {
        color: var(--primary-blue);
        text-decoration: none;
        font-weight: 500;
    }

    .read-more:hover {
        text-decoration: underline;
    }

    .section-title {
        color: var(--primary-blue);
    }

</style>

<div class="container py-5">

    <!-- HEADER -->
    <div class="text-center mb-5">
        <h1 class="fw-bold section-title">Blog & Tips Otomotif</h1>
        <p class="text-muted">
            Insight ringan tapi berguna biar mobil kamu tetap prima 🚗
        </p>

        <hr style="width:80px;height:4px;background:var(--primary-blue);margin:20px auto;border:none;border-radius:10px;">
    </div>

    <!-- LIST ARTIKEL -->
    <div class="row g-4">

        <!-- ARTIKEL 1 -->
        <div class="col-md-4">
            <div class="blog-card p-4 shadow-sm">

                <div class="blog-icon mb-3">🛢️</div>

                <h5 class="fw-bold">
                    Kapan Waktu yang Tepat Ganti Oli?
                </h5>

                <p class="text-muted small">
                    Ganti oli sebaiknya dilakukan setiap 5.000 - 10.000 km tergantung jenis kendaraan dan kondisi penggunaan...
                </p>

                <a href="#" class="read-more">
                    Baca Selengkapnya →
                </a>

            </div>
        </div>

        <!-- ARTIKEL 2 -->
        <div class="col-md-4">
            <div class="blog-card p-4 shadow-sm">

                <div class="blog-icon mb-3">⚙️</div>

                <h5 class="fw-bold">
                    Tanda Kaki-Kaki Mobil Bermasalah
                </h5>

                <p class="text-muted small">
                    Jika mobil terasa tidak stabil atau muncul bunyi aneh saat jalan, bisa jadi ada masalah pada kaki-kaki...
                </p>

                <a href="#" class="read-more">
                    Baca Selengkapnya →
                </a>

            </div>
        </div>

        <!-- ARTIKEL 3 -->
        <div class="col-md-4">
            <div class="blog-card p-4 shadow-sm">

                <div class="blog-icon mb-3">❄️</div>

                <h5 class="fw-bold">
                    AC Mobil Tidak Dingin? Ini Penyebabnya
                </h5>

                <p class="text-muted small">
                    AC yang tidak dingin bisa disebabkan oleh freon habis, kompresor rusak, atau filter kabin kotor...
                </p>

                <a href="#" class="read-more">
                    Baca Selengkapnya →
                </a>

            </div>
        </div>

    </div>

</div>

@endsection
