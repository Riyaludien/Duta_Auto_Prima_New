@extends('layouts.user')

@section('content')

<style>
    :root {
        --bg-main: #F8FAFC;
        --text-main: #0F172A;
        --text-muted: #64748B;
        --primary-red: #EF4444;
    }

    body {
        background-color: var(--bg-main) !important;
    }

    .section-title {
        color: var(--primary-red);
    }

    .card-custom {
        border-radius: 16px;
        background: #FFFFFF;
        transition: 0.25s;
    }

    .card-custom:hover {
        transform: translateY(-6px);
        box-shadow: 0 12px 25px rgba(0,0,0,0.08);
    }

    .service-card {
        border-radius: 16px;
        transition: 0.25s;
        background: #FFFFFF;
    }

    .service-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 12px 25px rgba(0,0,0,0.08);
        border: 1px solid var(--primary-red);
    }

    .summary-box {
        background: #FFFFFF;
        border-radius: 20px;
    }

    .cta-box {
        background: #FFFFFF;
        border-radius: 20px;
    }
</style>

<div class="container py-5">

    <!-- HEADER -->
    <div class="text-center mb-5">
        <h1 class="fw-bold section-title">TENTANG KAMI</h1>
        <p class="text-muted">Pusat Perbaikan & Perawatan Kendaraan Terpercaya di Yogyakarta</p>

        <hr style="width:80px;height:4px;background:#EF4444;margin:20px auto;border:none;border-radius:10px;">
    </div>

    <!-- SECTION 1 -->
    <div class="row align-items-center mb-5 g-4">

        <div class="col-lg-6">
            <h2 class="fw-bold mb-3">Bengkel Momo Yogyakarta</h2>

            <p style="color:#475569;text-align:justify;">
                <strong>Bengkel Mobil Panggilan 24 Jam Yogyakarta (Bengkel Momo)</strong>
                adalah pusat perbaikan kendaraan terpercaya di Tamantirto, Bantul.
            </p>

            <p style="color:#64748B;text-align:justify;">
                Kami hadir sebagai solusi lengkap dengan mekanik berpengalaman dan pelayanan profesional
                baik di bengkel maupun layanan darurat di jalan.
            </p>
        </div>

        <div class="col-lg-6">
            <div class="card-custom p-4 shadow-sm border-start border-4 border-danger">
                <h5 class="fw-bold mb-2">
                    <i class="bi bi-shield-check text-danger me-2"></i>Komitmen Kami
                </h5>

                <p class="mb-0 text-muted">
                    Kendaraan Anda adalah prioritas kami. Kami memastikan setiap perbaikan dilakukan
                    dengan <strong>akurat, transparan, dan efisien.</strong>
                </p>
            </div>
        </div>

    </div>

    <!-- LAYANAN -->
    <div class="row g-4 mb-5">

        <div class="col-12 text-center mb-2">
            <h3 class="fw-bold">Layanan Unggulan</h3>
        </div>

        @php
            $services = [
                ['title' => 'Perawatan Mesin', 'desc' => 'Tune up, servis injeksi & diesel.', 'icon' => 'bi-gear-wide-connected'],
                ['title' => 'Transmisi & Kemudi', 'desc' => 'Servis mobil matic & steering.', 'icon' => 'bi-compass'],
                ['title' => 'Kelistrikan', 'desc' => 'Perbaikan sistem listrik kendaraan.', 'icon' => 'bi-lightning-charge'],
                ['title' => 'Darurat 24 Jam', 'desc' => 'Layanan panggilan area Jogja.', 'icon' => 'bi-telephone-outbound'],
            ];
        @endphp

        @foreach($services as $s)
        <div class="col-md-3">
            <div class="service-card text-center p-3 shadow-sm h-100">
                <i class="bi {{ $s['icon'] }} display-6 text-danger mb-2"></i>
                <h6 class="fw-bold">{{ $s['title'] }}</h6>
                <p class="small text-muted">{{ $s['desc'] }}</p>
            </div>
        </div>
        @endforeach

    </div>

    <!-- STATISTIK -->
    <div class="row mb-5 p-4 shadow-sm summary-box text-center">

        <div class="col-md-4">
            <h2 class="fw-bold text-danger">4.8/5</h2>
            <p class="text-muted">Rating Google</p>
        </div>

        <div class="col-md-4 border-start border-end">
            <h2 class="fw-bold text-danger">24 Jam</h2>
            <p class="text-muted">Layanan Darurat</p>
        </div>

        <div class="col-md-4">
            <h2 class="fw-bold text-danger">Bantul</h2>
            <p class="text-muted">Lokasi Strategis</p>
        </div>

    </div>

    <!-- CONTACT -->
    <div class="row g-4">

        <div class="col-md-6">
            <h4 class="fw-bold mb-3">Hubungi Kami</h4>

            <ul class="list-unstyled" style="color:#475569;">
                <li class="mb-3">
                    <i class="bi bi-geo-alt-fill text-danger me-2"></i>
                    Kasihan RT 07, Tamantirto, Bantul
                </li>

                <li class="mb-3">
                    <i class="bi bi-whatsapp text-danger me-2"></i>
                    +62 857-4390-9369
                </li>

                <li class="mb-3">
                    <i class="bi bi-clock-fill text-danger me-2"></i>
                    08.30 – 23.00 WIB
                </li>
            </ul>
        </div>

        <div class="col-md-6">
            <div class="cta-box p-4 shadow-sm text-center">

                <h5 class="mb-3">Butuh Bantuan Darurat?</h5>

                <a href="https://wa.me/6283838762064"
                   class="btn btn-danger rounded-pill px-4 fw-semibold">
                    <i class="bi bi-whatsapp me-2"></i>Hubungi Teknisi
                </a>

            </div>
        </div>

    </div>

</div>

@endsection