<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Duta Auto Prima</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        :root {
            --primary-blue: #2563eb;
            --primary-blue-hover: #1e40af;
            --bg-main: #f8fafc;
            --surface-white: #ffffff;
            --surface-light: #eff6ff;
            --border-light: #e2e8f0;
            --accent-blue: #38bdf8;
            --accent-soft: #dbeafe;
            --text-main: #0f172a;
            --text-muted: #64748b;
            --success: #22c55e;
            --danger: #ef4444;
        }

        body {
            background: var(--bg-main);
            color: var(--text-main);
            font-family: 'Poppins', sans-serif;
        }

        .section-title {
            color: var(--primary-blue);
            font-weight: 700;
        }

        .card-custom {
            background: var(--surface-white);
            border: 1px solid var(--border-light);
            border-radius: 16px;
            transition: 0.25s;
        }

        .card-custom:hover {
            transform: translateY(-6px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
        }

        .service-card {
            background: var(--surface-white);
            border-radius: 16px;
            border: 1px solid var(--border-light);
            transition: 0.25s;
        }

        .service-card:hover {
            transform: translateY(-6px);
            border-color: var(--primary-blue);
            box-shadow: 0 12px 25px rgba(37, 99, 235, 0.15);
        }

        .summary-box,
        .cta-box {
            background: var(--surface-white);
            border-radius: 20px;
            border: 1px solid var(--border-light);
        }

        .text-muted {
            color: var(--text-muted) !important;
        }
    </style>
</head>

<body>

    <div class="container py-5">

        <!-- AUTH -->
        <div class="d-flex justify-content-end mb-4 gap-2">
            @auth
                <a href="{{ route('beranda') }}" class="btn btn-primary"
                    style="background:var(--primary-blue);border:none;">
                    Dashboard
                </a>
            @else
                <a href="{{ route('login') }}" class="btn btn-outline-primary">Login</a>
                <a href="{{ route('register') }}" class="btn btn-primary"
                    style="background:var(--primary-blue);border:none;">Daftar</a>
            @endauth
        </div>

        <!-- HEADER -->
        <div class="text-center mb-5">
            <h1 class="section-title">
                <i class="bi bi-gear-wide-connected"></i> DUTA AUTO PRIMA
            </h1>
            <p class="text-muted">
                Pusat servis & perawatan kendaraan modern di Yogyakarta
            </p>
        </div>
        <div class="py-2 overflow-hidden border-top border-bottom" style="background: white;">

            <div class="d-inline-block text-nowrap fw-semibold"
                style="animation: scrollText 22s linear infinite; letter-spacing: .3px;">

                ⚙️ Service Engine • ❄️ AC Mobil • 🔋 Kelistrikan • 🛞 Kaki-kaki •
                🚨 Layanan Darurat 24 Jam • 📍 Yogyakarta •
                💡 Diagnosa cepat & akurat •
            </div>
        </div>

        <style>
            .section-title {
                font-size: clamp(2rem, 4vw, 3.5rem);
                font-weight: 900;
                letter-spacing: 2px;
                color: var(--primary-blue);
                text-transform: uppercase;
                text-shadow: 0 4px 20px rgba(37, 99, 235, 0.2);
            }

            @keyframes scrollText {
                0% {
                    transform: translateX(100%);
                }

                100% {
                    transform: translateX(-100%);
                }
            }
        </style>

        <!-- HERO SECTION -->
        <div class="card-custom p-5 mb-5 text-center">
            <h2 class="fw-bold">Solusi Servis Mobil Lebih Cepat & Mudah</h2>
            <p class="text-muted">
                Booking, servis, dan konsultasi langsung dalam satu platform.
            </p>
            <a href="{{ route('beranda') }}" class="btn mt-3 text-white"
                style="background:var(--primary-blue); border-radius:999px;">
                Mulai Sekarang
            </a>
        </div>

        <!-- ABOUT -->
        <div class="row mb-5 g-4">

            <div class="col-lg-6">
                <h4 class="fw-bold">Tentang Kami</h4>
                <p class="text-muted">
                    Bengkel modern dengan layanan lengkap: mesin, kelistrikan, AC, hingga darurat jalan.
                </p>
            </div>

            <div class="col-lg-6">
                <div class="card-custom p-4">
                    <h6 class="fw-bold">
                        <i class="bi bi-shield-check text-primary"></i> Komitmen Kami
                    </h6>
                    <p class="text-muted mb-0">
                        Transparan, cepat, dan profesional dalam setiap pengerjaan.
                    </p>
                </div>
            </div>

        </div>

        <!-- SERVICES -->
        <div class="text-center mb-4">
            <h4 class="fw-bold">Layanan Unggulan</h4>
        </div>

        <div class="row g-4 mb-5">
            @php
                $services = [
                    ['title' => 'Mesin', 'icon' => 'bi-gear'],
                    ['title' => 'AC Mobil', 'icon' => 'bi-snow'],
                    ['title' => 'Kelistrikan', 'icon' => 'bi-lightning'],
                    ['title' => 'Darurat', 'icon' => 'bi-telephone'],
                ];
            @endphp

            @foreach($services as $s)
                <div class="col-md-3">
                    <div class="service-card p-4 text-center h-100">
                        <i class="bi {{ $s['icon'] }} fs-1 text-primary"></i>
                        <h6 class="mt-2 fw-bold">{{ $s['title'] }}</h6>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- STATS -->
        <div class="row summary-box p-4 text-center mb-5">

            <div class="col-md-4">
                <h3 class="text-primary fw-bold">4.8</h3>
                <p class="text-muted">Rating</p>
            </div>

            <div class="col-md-4">
                <h3 class="text-primary fw-bold">24 Jam</h3>
                <p class="text-muted">Layanan</p>
            </div>

            <div class="col-md-4">
                <h3 class="text-primary fw-bold">1000+</h3>
                <p class="text-muted">Pelanggan</p>
            </div>

        </div>

        <!-- CTA -->
        <div class="cta-box p-5 text-center">
            <h4 class="fw-bold">Butuh bantuan sekarang?</h4>
            <p class="text-muted">Langsung hubungi teknisi kami.</p>
            <a href="https://wa.me/6283838762064" class="btn text-white px-4 rounded-pill"
                style="background:var(--primary-blue);">
                Hubungi WhatsApp
            </a>
        </div>

    </div>

</body>

</html>