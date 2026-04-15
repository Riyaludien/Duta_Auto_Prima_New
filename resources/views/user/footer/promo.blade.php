@extends('layouts.user')

@section('title', 'Dalam Pengembangan')

@section('content')

<style>
    .coming-wrapper {
        min-height: 80vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .coming-card {
        max-width: 600px;
        border-radius: 20px;
        background: var(--surface-white);
        border: 1px solid var(--border-light);
        text-align: center;
        padding: 40px;
        transition: 0.3s;
    }

    .coming-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.06);
    }

    .coming-icon {
        font-size: 60px;
        margin-bottom: 20px;
        color: var(--primary-blue);
    }

    .btn-back {
        border-radius: 999px;
    }
</style>

<div class="container coming-wrapper">

    <div class="coming-card shadow-sm">

        <!-- ICON -->
        <div class="coming-icon">
            🚧
        </div>

        <!-- TITLE -->
        <h2 class="fw-bold mb-2" style="color: var(--primary-blue);">
            Dalam Pengembangan
        </h2>

        <!-- DESC -->
        <p class="text-muted mb-4">
            Halaman ini sedang kami siapkan.  
            Tunggu ya, fitur keren lagi dimasak 🔥
        </p>

        <!-- BUTTON -->
        <div class="d-flex justify-content-center gap-2">

            <a href="/" class="btn btn-outline-secondary btn-back px-4">
                Kembali ke Beranda
            </a>

            <a href="https://wa.me/6283838762064"
               target="_blank"
               class="btn text-white btn-back px-4"
               style="background: var(--primary-blue);">

                <i class="bi bi-whatsapp me-1"></i>
                Hubungi Admin
            </a>

        </div>

    </div>

</div>

@endsection