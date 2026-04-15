@extends('layouts.user')

@section('title', 'Mitra Bengkel Momo')

@section('content')

<style>
    .mitra-card {
        border-radius: 16px;
        background: var(--surface-white);
        border: 1px solid var(--border-light);
        transition: 0.25s;
        height: 100%;
    }

    .mitra-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 12px 25px rgba(0,0,0,0.06);
        border-color: var(--primary-blue);
    }

    .mitra-icon {
        width: 60px;
        height: 60px;
        background: var(--surface-light);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 26px;
    }

    .cta-box {
        border-radius: 20px;
        background: var(--surface-white);
        border: 1px solid var(--border-light);
    }

    .section-title {
        color: var(--primary-blue);
    }
</style>

<div class="container py-5">

    <!-- HEADER -->
    <div class="text-center mb-5">
        <h1 class="fw-bold section-title">Mitra Kami</h1>
        <p class="text-muted">
            Bergabunglah menjadi bagian dari jaringan Bengkel Momo 🚗
        </p>

        <hr style="width:80px;height:4px;background:var(--primary-blue);margin:20px auto;border:none;border-radius:10px;">
    </div>

    <!-- LIST MITRA -->
    <div class="row g-4 mb-5">

        <div class="col-md-4">
            <div class="mitra-card p-4 shadow-sm text-center">
                <div class="mitra-icon mb-3">🔧</div>
                <h5 class="fw-bold">MITRA 1</h5>
                <p class="text-muted small">
                    Menyediakan berbagai sparepart berkualitas untuk kebutuhan bengkel.
                </p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="mitra-card p-4 shadow-sm text-center">
                <div class="mitra-icon mb-3">🚗</div>
                <h5 class="fw-bold">MITRA 2</h5>
                <p class="text-muted small">
                    Bengkel yang bekerja sama dalam pelayanan servis dan perawatan kendaraan.
                </p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="mitra-card p-4 shadow-sm text-center">
                <div class="mitra-icon mb-3">📦</div>
                <h5 class="fw-bold">MITRA 3</h5>
                <p class="text-muted small">
                    Mitra distribusi untuk memperluas jangkauan layanan dan produk.
                </p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="mitra-card p-4 shadow-sm text-center">
                <div class="mitra-icon mb-3">🔧</div>
                <h5 class="fw-bold">MITRA 4</h5>
                <p class="text-muted small">
                    Menyediakan berbagai sparepart berkualitas untuk kebutuhan bengkel.
                </p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="mitra-card p-4 shadow-sm text-center">
                <div class="mitra-icon mb-3">🚗</div>
                <h5 class="fw-bold">MITRA 5</h5>
                <p class="text-muted small">
                    Bengkel yang bekerja sama dalam pelayanan servis dan perawatan kendaraan.
                </p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="mitra-card p-4 shadow-sm text-center">
                <div class="mitra-icon mb-3">📦</div>
                <h5 class="fw-bold">MITRA 6</h5>
                <p class="text-muted small">
                    Mitra distribusi untuk memperluas jangkauan layanan dan produk.
                </p>
            </div>
        </div>

    </div>

    <!-- CTA DAFTAR -->
    <div class="cta-box p-5 text-center shadow-sm">

        <h4 class="fw-bold mb-3">Ingin Jadi Mitra?</h4>

        <p class="text-muted mb-4">
            Kami terbuka untuk kerja sama dengan berbagai pihak.  
            Klik tombol di bawah untuk langsung mendaftar via WhatsApp.
        </p>

        @php
            $wa = "6283838762064";
            $pesan = urlencode("Halo admin Bengkel Momo, saya tertarik untuk menjadi mitra. Berikut data saya:\n\nNama:\nUsaha:\nAlamat:\nNo HP:");
        @endphp

        <a href="https://wa.me/{{ $wa }}?text={{ $pesan }}"
           target="_blank"
           class="btn text-white px-5 py-2 fw-bold rounded-pill"
           style="background: var(--primary-blue);">

            <i class="bi bi-whatsapp me-2"></i>
            Daftar Jadi Mitra
        </a>

    </div>

</div>

@endsection