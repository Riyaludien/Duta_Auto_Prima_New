@extends('layouts.user')

@section('title', 'Kebijakan Privasi')

@section('content')

<style>
    .privacy-card {
        border-radius: 16px;
        background: var(--surface-white);
        border: 1px solid var(--border-light);
        transition: 0.25s;
    }

    .privacy-card:hover {
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
    }

    .section-title {
        color: var(--primary-blue);
    }

    .divider {
        width: 80px;
        height: 4px;
        background: var(--primary-blue);
        margin: 20px 0;
        border-radius: 10px;
    }

</style>

<div class="container py-5">

    <!-- HEADER -->
    <div class="text-center mb-5">
        <h1 class="fw-bold section-title">Kebijakan Privasi</h1>
        <p class="text-muted">
            Kami berkomitmen menjaga keamanan dan kerahasiaan data Anda
        </p>

        <hr style="width:80px;height:4px;background:var(--primary-blue);margin:20px auto;border:none;border-radius:10px;">
    </div>

    <!-- CONTENT -->
    <div class="privacy-card p-4 p-md-5 shadow-sm">

        <!-- 1 -->
        <div class="mb-4">
            <h5 class="fw-bold">1. Informasi yang Dikumpulkan</h5>
            <p class="text-muted mb-0">
                Kami dapat mengumpulkan informasi seperti nama, nomor telepon, email, dan data kendaraan saat Anda menggunakan layanan kami.
            </p>
        </div>

        <!-- 2 -->
        <div class="mb-4">
            <h5 class="fw-bold">2. Penggunaan Informasi</h5>
            <p class="text-muted mb-0">
                Informasi digunakan untuk keperluan layanan, komunikasi dengan pelanggan, serta peningkatan kualitas layanan kami.
            </p>
        </div>

        <!-- 3 -->
        <div class="mb-4">
            <h5 class="fw-bold">3. Perlindungan Data</h5>
            <p class="text-muted mb-0">
                Kami menjaga keamanan data pengguna dan tidak akan membagikan informasi pribadi tanpa izin, kecuali diwajibkan oleh hukum.
            </p>
        </div>

        <!-- 4 -->
        <div class="mb-4">
            <h5 class="fw-bold">4. Cookies</h5>
            <p class="text-muted mb-0">
                Website kami dapat menggunakan cookies untuk meningkatkan pengalaman pengguna selama menggunakan layanan.
            </p>
        </div>

        <!-- 5 -->
        <div class="mb-4">
            <h5 class="fw-bold">5. Perubahan Kebijakan</h5>
            <p class="text-muted mb-0">
                Kebijakan privasi ini dapat diperbarui sewaktu-waktu tanpa pemberitahuan sebelumnya.
            </p>
        </div>

        <hr class="my-4">

        <!-- FOOTER INFO -->
        <div class="text-center">
            <p class="fw-semibold mb-2">
                Kami berkomitmen untuk menjaga kerahasiaan data Anda dengan sebaik mungkin.
            </p>

            <p class="text-muted mb-1">
                Hubungi kami:
                <a href="mailto:support@bengkel.com" style="color: var(--primary-blue);">
                    support@bengkel.com
                </a>
            </p>

            <small class="text-muted">
                Terakhir diperbarui: April 2026
            </small>
        </div>

    </div>

</div>

@endsection
