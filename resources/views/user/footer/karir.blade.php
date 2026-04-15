@extends('layouts.user')

@section('title', 'Bengkel Momo - Karir')

@section('content')

<style>
    .card-custom {
        border-radius: 16px;
        background: var(--surface-white);
        transition: 0.25s;
        border: 1px solid var(--border-light);
    }

    .card-custom:hover {
        transform: translateY(-6px);
        box-shadow: 0 12px 25px rgba(0, 0, 0, 0.06);
    }

    .job-card {
        border-radius: 16px;
        background: var(--surface-white);
        border: 1px solid var(--border-light);
        transition: 0.25s;
    }

    .job-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 12px 25px rgba(0, 0, 0, 0.06);
        border-color: var(--primary-blue);
    }

    .cta-box {
        background: var(--surface-white);
        border-radius: 20px;
        border: 1px solid var(--border-light);
    }

    .section-title {
        color: var(--primary-blue);
    }

</style>

<div class="container py-5">

    <!-- HEADER -->
    <div class="text-center mb-5">
        <h1 class="fw-bold section-title">KARIR</h1>
        <p class="text-muted">
            Bergabunglah bersama tim Bengkel Momo dan berkembang bersama kami 🚗
        </p>

        <hr style="width:80px;height:4px;background:var(--primary-blue);margin:20px auto;border:none;border-radius:10px;">
    </div>

    <!-- WHY JOIN -->
    <div class="card-custom p-4 mb-5 shadow-sm">
        <h4 class="fw-bold mb-3">Kenapa Bergabung Dengan Kami?</h4>

        <ul style="color:var(--text-muted);">
            <li>Lingkungan kerja yang solid dan suportif</li>
            <li>Kesempatan belajar dan berkembang</li>
            <li>Pengalaman kerja di dunia otomotif</li>
        </ul>
    </div>

    <!-- JOB LIST -->
    <div class="mb-5">

        <h4 class="fw-bold mb-4">Lowongan Tersedia</h4>

        <div class="row g-4">

            <!-- TEKNISI -->
            <div class="col-md-6">
                <div class="job-card p-4 shadow-sm h-100">

                    <h5 class="fw-bold mb-2">
                        🔧 Teknisi Bengkel
                    </h5>

                    <p class="text-muted mb-2">
                        Melakukan servis kendaraan seperti ganti oli, pengecekan, dan perawatan mesin.
                    </p>

                    <p class="mb-0">
                        <strong>Syarat:</strong> Mengerti dasar otomotif, jujur, dan mau belajar.
                    </p>

                </div>
            </div>

            <!-- ADMIN -->
            <div class="col-md-6">
                <div class="job-card p-4 shadow-sm h-100">

                    <h5 class="fw-bold mb-2">
                        📞 Admin / Customer Service
                    </h5>

                    <p class="text-muted mb-2">
                        Melayani pelanggan, mengatur jadwal servis, dan mengelola data.
                    </p>

                    <p class="mb-0">
                        <strong>Syarat:</strong> Ramah, komunikatif, dan bisa menggunakan komputer.
                    </p>

                </div>
            </div>

        </div>

    </div>

    <!-- CTA -->
    <div class="cta-box p-5 shadow-sm text-center">

        <h4 class="fw-bold mb-3">Tertarik Bergabung?</h4>

        <p class="text-muted mb-4">
            Kirim CV dan data diri kamu sekarang, dan jadilah bagian dari tim kami.
        </p>

        <div class="d-flex flex-column flex-md-row justify-content-center gap-3">

            <a href="mailto:hr@bengkel.com" class="btn btn-outline-primary rounded-pill px-4">
                📧 Kirim Email
            </a>

            <a href="https://wa.me/628xxxxxxxxxx" class="btn rounded-pill px-4 text-white" style="background: var(--primary-blue);">
                <i class="bi bi-whatsapp me-1"></i> Chat via WhatsApp
            </a>

        </div>

    </div>

</div>

@endsection
